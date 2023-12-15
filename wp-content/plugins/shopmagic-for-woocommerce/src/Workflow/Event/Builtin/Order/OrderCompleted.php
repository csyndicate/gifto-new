<?php
declare( strict_types=1 );

namespace WPDesk\ShopMagic\Workflow\Event\Builtin\Order;

use WPDesk\ShopMagic\Workflow\Event\Builtin\OrderCommonEvent;
use function __;
use function add_action;

final class OrderCompleted extends OrderCommonEvent {
	public function get_id(): string {
		return 'shopmagic_order_completed_event';
	}

	public function get_name(): string {
		return __( 'Order Completed', 'shopmagic-for-woocommerce' );
	}

	public function get_description(): string {
		return __( 'Run automation when order status is set to completed.', 'shopmagic-for-woocommerce' );
	}

	public function initialize(): void {
		add_action(
			'woocommerce_order_status_completed',
			function ( $order_id, $order ) {
				$this->process_event( $order_id, $order );
			},
			10,
			2
		);
	}

}
