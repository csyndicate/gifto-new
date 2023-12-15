<?php

class Wallet {

	public $user_id = null;

	public function __constract( $user_id = null ) {

		$this->$user_id = $user_id;

	}

	/**
	 * Get user balance
	 *
	 * @param $user_id
	 * @param $unavailable
	 *
	 * @return bool|false|string
	 */
	public static function get_balance( $user_id, $unavailable = true ) {

		global $wpdb;

		$result = $wpdb->get_row( "SELECT balance, unavailable_funds FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );

		$balance           = 0;
		$unavailable_funds = 0;
		if ( $result ) {
			$balance = (float) FS_WC_Wallet::encrypt_decrypt( 'decrypt', $result->balance );

			if ( $unavailable ) {
				$unavailable_funds = (float) FS_WC_Wallet::encrypt_decrypt( 'decrypt', $result->unavailable_funds );
			}
		}

		return ( $balance - $unavailable_funds );

	}

	/**
	 * Get unavailable funds
	 *
	 * @param $user_id
	 *
	 * @return bool|false|string
	 */
	public static function get_unavailable_funds( $user_id ) {

		global $wpdb;

		$balance = $wpdb->get_var( "SELECT unavailable_funds FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );

		return FS_WC_Wallet::encrypt_decrypt( 'decrypt', $balance );

	}

	/**
	 * Set user balance
	 *
	 * @param $user_id
	 * @param $amount
	 */
	public static function set_balance( $user_id, $amount ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$data = array(
			'balance' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $amount )
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

	}

	/**
	 * Set unavailable funds
	 *
	 * @param $user_id
	 * @param $amount
	 */
	public static function set_unavailable_funds( $user_id, $amount ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$data = array(
			'unavailable_funds' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $amount )
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

	}

	/**
	 * Add total spent
	 *
	 * @param $user_id
	 * @param $amount
	 */
	public static function add_spending( $user_id, $amount ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$total_spent = FS_WC_Wallet::encrypt_decrypt( 'decrypt',
			$wpdb->get_var( "SELECT total_spent FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" ) );
		$total_spent = $amount + $total_spent;

		$data = array(
			'total_spent' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $total_spent )
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

	}

	/**
	 * Add unavailable funds
	 *
	 * @param $user_id
	 * @param $amount
	 */
	public static function add_unavailable_funds( $user_id, $amount ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$unavailable_funds = FS_WC_Wallet::encrypt_decrypt( 'decrypt',
			$wpdb->get_var( "SELECT unavailable_funds FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" ) );
		$unavailable_funds = $amount + $unavailable_funds;

		$data = array(
			'unavailable_funds' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $unavailable_funds )
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

	}

	/**
	 * Add funds
	 *
	 * @param $user_id
	 * @param $amount
	 * @param int $order_id
	 * @param string $description
	 */
	public static function add_funds( $user_id, $amount, $order_id = 0, $description = "" ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$current_balance = Wallet::get_balance( $user_id, false );
		$new_balance     = $current_balance + $amount;

		$last_deposit = date( 'Y-m-d H:i:s' );

		$data = array(
			'balance'      => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $new_balance ),
			'last_deposit' => $last_deposit
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

		Wallet::add_transaction( $order_id, $user_id, 'credits', $amount, $description );

	}

	/**
	 * Withdraw funds
	 *
	 * @param $user_id
	 * @param $amount
	 * @param int $order_id
	 * @param string $description
	 */
	public static function withdraw_funds( $user_id, $amount, $order_id = 0, $description = "" ) {

		global $wpdb;

		$current_balance = Wallet::get_balance( $user_id, false );

		if ( $current_balance >= $amount ) {

			$new_balance = $current_balance - $amount;

			$data = array(
				'balance' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $new_balance )
			);

			$where = array(
				'user_id' => $user_id
			);

			$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

		}

		Wallet::add_transaction( $order_id, $user_id, 'debits', $amount, $description );

	}

	/**
	 * Remove unavailable funds
	 *
	 * @param $user_id
	 * @param $amount
	 */
	public static function remove_unavailable_funds( $user_id, $amount ) {

		global $wpdb;

		$current_balance = Wallet::get_unavailable_funds( $user_id );

		if ( $current_balance >= $amount ) {

			$new_balance = $current_balance - $amount;

			$data = array(
				'unavailable_funds' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $new_balance )
			);

			$where = array(
				'user_id' => $user_id
			);

			$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

		}

	}


	/**
	 * Lock wallet
	 *
	 * @param $user_id
	 * @param $lock_message
	 */
	public static function lock_account( $user_id, $lock_message ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$data = array(
			'status'       => 'locked',
			'lock_message' => $lock_message
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

	}

	/**
	 * Unlock wallet
	 *
	 * @param $user_id
	 */
	public static function unlock_account( $user_id ) {

		global $wpdb;

		$data = array(
			'status' => 'unlocked'
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

	}

	/**
	 * Check wallet lock status
	 *
	 * @param $user_id
	 *
	 * @return array|string[]
	 */
	public static function lock_status( $user_id ) {

		global $wpdb;

		$query = $wpdb->get_results( "SELECT status, lock_message FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );

		if ( $query ) {
			return array(
				'status'       => $query[0]->status,
				'lock_message' => $query[0]->lock_message,
			);
		}

		return array(
			'status'       => '',
			'lock_message' => ''
		);
	}

	/**
	 * Process refunds
	 *
	 * @param $user_id
	 * @param $amount
	 * @param int $order_id
	 * @param string $description
	 * @param bool $no_fees
	 */
	public static function refund( $user_id, $amount, $order_id = 0, $description = "", $no_fees = false ) {

		global $wpdb;

		$type = get_option( 'fsww_fee_refund_type', 'percentage' );

		$old_value = (float) get_option( 'fsww_refund_rate', '100' );
		$charge    = get_option( 'fsww_fee_refund_amount', abs( $old_value - 100 ) );

		$fee = 0;
		if ( $type == 'percentage' ) {
			$fee = ( $amount / 100 ) * $charge;
		} else {
			$fee = (int) $charge;
		}

		if ( ! Wallet::wallet_exist( $user_id ) ) {
			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );
		}

		if ( ! $no_fees ) {
			$amount = $amount - $fee;
		}

		$current_balance = Wallet::get_balance( $user_id, false );
		$new_balance     = $current_balance + $amount;

		$data = array(
			'balance' => FS_WC_Wallet::encrypt_decrypt( 'encrypt', $new_balance )
		);

		$where = array(
			'user_id' => $user_id
		);

		$wpdb->update( "{$wpdb->prefix}fswcwallet", $data, $where );

		Wallet::add_transaction( $order_id, $user_id, 'credits', $amount, $description );

		if ( $order_id != 0 ) {

			$order = wc_get_order( $order_id );
			$order->update_status( 'refunded', __( 'Payment refunded using Wallet Credit', 'fsww' ) );

		}

	}

	/**
	 * Record transaction
	 *
	 * @param $order_id
	 * @param $user_id
	 * @param $type
	 * @param $amount
	 * @param string $description
	 */
	public static function add_transaction( $order_id, $user_id, $type, $amount, $description = "" ) {

		global $wpdb;

		if ( ! Wallet::wallet_exist( $user_id ) ) {

			Wallet::create_wallet( $user_id, 0, 0, 'unlocked' );

		}

		$data = array(
			'order_id'                => $order_id,
			'type'                    => $type,
			'user_id'                 => $user_id,
			'amount'                  => $amount,
			'transaction_date'        => date( 'Y-m-d H:i:s' ),
			'transaction_description' => $description,
			'action_performed_by'     => get_current_user_id()
		);

		$wpdb->insert( "{$wpdb->prefix}fswcwallet_transaction", $data );

	}

	/**
	 * Create wallet
	 *
	 * @param $user_id
	 * @param $balance
	 * @param $total_spent
	 * @param $status
	 */
	public static function create_wallet( $user_id, $balance, $total_spent, $status ) {

		global $wpdb;

		$balance     = FS_WC_Wallet::encrypt_decrypt( 'encrypt', $balance );
		$total_spent = FS_WC_Wallet::encrypt_decrypt( 'encrypt', $total_spent );

		$data = array(
			'user_id'      => $user_id,
			'balance'      => $balance,
			'last_deposit' => date( 'Y-m-d H:i:s' ),
			'total_spent'  => $total_spent,
			'status'       => $status
		);

		$wpdb->insert( "{$wpdb->prefix}fswcwallet", $data );

		//die('<pre>' . print_r($data, true) . '</pre>');

	}

	/**
	 * Check if a wallet exists
	 *
	 * @param $user_id
	 *
	 * @return bool
	 */
	public static function wallet_exist( $user_id ) {

		global $wpdb;

		return (int) $wpdb->get_var( "SELECT COUNT(*) FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" ) > 0;

	}

	/**
	 * Get total spent
	 *
	 * @param $user_id
	 *
	 * @return bool|false|string
	 */
	public static function get_total_spent( $user_id ) {

		global $wpdb;

		$detail = $wpdb->get_var( "SELECT total_spent FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );

		return FS_WC_Wallet::encrypt_decrypt( 'decrypt', $detail );

	}

	/**
	 * Get last top up date
	 *
	 * @param $user_id
	 *
	 * @return string|null
	 */
	public static function get_last_deposit( $user_id ) {
		global $wpdb;

		return $wpdb->get_var( "SELECT last_deposit FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );
	}


	/**
	 * Get lock status
	 *
	 * @param $user_id
	 *
	 * @return string|null
	 */
	public static function get_status( $user_id ) {
		global $wpdb;

		return $wpdb->get_var( "SELECT status FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );
	}

	/**
	 * Lock message
	 *
	 * @param $user_id
	 *
	 * @return string|null
	 */
	public static function get_lock_message( $user_id ) {

		global $wpdb;

		$detail = $wpdb->get_var( "SELECT lock_message FROM {$wpdb->prefix}fswcwallet WHERE user_id={$user_id}" );

		return $detail;

	}

}
