<?php
/**
 * Plugin Name: Simple-contact-form
 * Description: Simple-contact-form
 * Author: Obi-Wan
 * Author URI: localhost
 * Version: 1.0.0
 * Text Domain: localhost
 * 
 */

 if (!defined("ABSPATH")) {
    echo 'Henloo';
    exit;
 }

 class SimpleContactForm {

    public function __construct() {
        add_action('init', array($this, 'create_custom_post_type'));

        add_action('wp_enqueue_scripts', array($this, 'load_assets'));

        add_shortcode('contact-form', array($this, 'load_shortcode'));

        add_action('wp_footer', array($this, 'load_scripts'));

        add_action('rest_api_init', array($this, 'register_rest_api'));

    }

    public function create_custom_post_type() {
        $args = array(
            'public' => true,
            'has_archived' => true,
            'supports' => array('title'),
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'capability' => 'manage_options',
            'labels' => array(
                'name' => 'Contact Form',
                'singular_name' =>  'Contact Form Entry',
            ),
            'menu_icon' => 'dashicons-media-text',
        );

        register_post_type('single_contact_form', $args);

    }

    public function load_assets() {

        wp_enqueue_style(
            'simple-contact-form',
            plugin_dir_url( __FILE__ ) . 'css/simple-contact-form.css',
            array(),
            1,
            'all'
        );

        wp_enqueue_script(
            'simple-contact-form',
            plugin_dir_url( __FILE__ ) . 'js/simple-contact-form.js',
            array('jquery'),
            1,
            true
        );
    }

    public function load_shortcode() {
       ?>

<div class='simple-contact-form'>
<h1>Send form</h1>
<p>Fill in below form</p>

<form id='simple-contact-form__form'>

       <input type="text" name='name' placeholder='name' class='form-control'>
       <input type="email" name='email' placeholder='email' class='form-control'>
       <input type="tel" name='tel' placeholder='phone' class='form-control'>

       <textarea placeholder='text' name='text' class='form-control' ></textarea>

       <button class='btn btn-success btn-block' type='submit'>Send</button>
    </form>

    </div>


       <?php 

    }

    public function load_scripts() {
        ?>

    <script>

        var nonce = '<?php echo wp_create_nonce('wp_rest'); ?>';
        
        (function($) {
            $('#simple-contact-form__form').submit( function(event) {
                event.preventDefault();
                var form = $(this).serialize();
                console.log(form);

                $.ajax({
                    method: 'post',
                    url: '<?php get_rest_url(null, 'simple-contact-form/v1/send-email'); ?>',
                    headers: { 'X-WP-Nonce': nonce },
                    data: form,

                })



})
        })(jQuery)


    </script>


        <?php
    }


    public function register_rest_api() {
        register_rest_route('simple-contact-form/v1', 'send-email', array(
            'methods' => 'POST', 
            'callback' => array($this, 'handle_contact_form')
        ));
    }

    public function handle_contact_form($data) {
        $headers = $data->get_headers();
        $params = $data->get_params();
        $nonce = $headers['x_wp_nonce'][0];

        echo json_encode($headers);

        if (!wp_verify_nonce($nonce, 'wp_nonce')) {
            return new WP_REST_Responce('Message not sent', 422);
        }

        $post_id = wp_insert_post([
            'post_type' => 'simple_contact_form',
            'post_title' => 'Contact enquiry',
            'post_status' => 'publish',


        ]);

        if ($post_id) {
            return new WP_REST_Responce('Thank u', 200);
        }
    }
     

 }

 new SimpleContactForm;