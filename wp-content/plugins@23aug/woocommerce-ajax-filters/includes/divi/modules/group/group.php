<?php

class ET_Builder_Module_br_filters_group extends ET_Builder_Module {

	public $slug       = 'et_pb_br_filters_group';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '',
		'author'     => '',
		'author_uri' => '',
	);

	public function init() {
        $this->name       = __( 'Group Filter', 'BeRocket_AJAX_domain' );

        $this->fields_defaults = array(
            'filter_id' => array(''),
        );
	}

    function get_fields() {
        $query = new WP_Query(array('post_type' => 'br_filters_group', 'nopaging' => true, 'fields' => 'ids'));
        $posts = $query->get_posts();
        $filter_list = array('0' => __('--Please select group--', 'BeRocket_AJAX_domain'));
        if ( is_array($posts) && count($posts) ) {
            foreach($posts as $post_id) {
                $filter_list[$post_id] = get_the_title($post_id) . ' (ID:' . $post_id . ')';
            }
        }
        $fields = array(
            'group_id' => array(
                'label'           => esc_html__( 'Group', 'BeRocket_AJAX_domain' ),
                'type'            => 'select',
                'options'         => $filter_list,
            ),
        );

        return $fields;
    }

    function render( $atts, $content = null, $function_name = '' ) {
        $html = '';
        if( ! empty($atts['group_id']) ) {
            $html .= trim(do_shortcode('[br_filters_group group_id='.$atts['group_id'].']'));
        }
        if(empty($html) && defined('DOING_AJAX') && in_array(berocket_isset($_REQUEST['action']), array('et_fb_ajax_render_shortcode', 'brapf_get_single_filter', 'brapf_get_group_filter'))) {
            $html .= '<h3 style="background-color:gray;color:white;">'.__('BeRocket Filter', 'BeRocket_AJAX_domain').'</h3>';
        }

        return $html;
    }
}

new ET_Builder_Module_br_filters_group;
