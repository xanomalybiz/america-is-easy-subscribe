<?php

class America_Is_Easy_Suscribe_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	function __construct() {
		parent::__construct(
			'America_Is_Easy_Suscribe_Widget', // Base ID
			__( 'America Is Easy Suscribe Widget', 'aes_domain' ), // Name
			array( 'description' => __( 'Widget lets users suscribe to america is easy newsletter', 'text_domain' ), ) // Args
		);
	}


	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		
		
		echo $args['before_widget'];
		echo $args['before_title'];
		if(!empty($instance['title']))
		{
			echo '<h3 id="subscribeTitle">'. $instance['title'] . ' - Newsletter</h3>';
			
		}
		echo $args['after_title'];				
		?>
     
        	<div id="form-msg"></div>
            <form id="suscriber-form" method="post" action="<?php echo plugins_url().'/america-is-easy-suscribe/includes/newsletter-suscriber-mailer.php';?>">
            <div class="form-group">
            	<label for="name">Name: </label><br>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
            	<label for="email">Email: </label><br>
                <input type="text" id="email" name="email" class="form-control" required>
            </div>
            <br>
            <input type="hidden" name="recipient" value="<?php echo $instance['recipient']; ?>">
            <input type="hidden" name="subject" value="<?php echo $instance['subject']; ?>">
            <input type="submit" class="btn btn-primary" name="suscriber_submit" value="Suscribe">
         
         
            </form>
           
            <a id="subscribe-xanomaly-link" href="http://xanomaly.com"> <h4>Powered by <span id="logo"><span id="homeBannerLogoX" class="xFont">X</span><span id="secondHalfLogo">anomaly</span> </span></h4></a>
        	
        <?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		// outputs the options form on admin
		$title = !empty($instance['title']) ? $instance['title'] : __('America Is Easy', 'aes_domain');
		$recipient = !empty($instance['recipient']) ? $instance['recipient'] : __('adjxanomaly@gmail.com', 'aes_domain');
		$subject = !empty($instance['subject']) ? $instance['subject'] : __('You have a new suscriber', 'aes_domain');
	
		?>
        	<p>
            	<label for="<?php echo $this->get_field_id('title');?>"> <?php _e('Title');?></label><br>
                <input type="text" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo esc_attr($title);?>">
                
            </p>
            <p>
            	<label for="<?php echo $this->get_field_id('recipient');?>"> <?php _e('Recipient');?></label><br>
                <input type="text" id="<?php echo $this->get_field_id('recipient');?>" name="<?php echo $this->get_field_name('recipient');?>" value="<?php echo esc_attr($recipient);?>">
                
            </p>
            <p>
            	<label for="<?php echo $this->get_field_id('subject');?>"> <?php _e('Subject');?></label><br>
                <input type="text" id="<?php echo $this->get_field_id('subject');?>" name="<?php echo $this->get_field_name('subject');?>" value="<?php echo esc_attr($subject);?>">
                
            </p>
        
        <?php
	
	}
	

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		
		$instance = array(
			'title' 	=> (!empty($new_instance['title'])) ? 	  strip_tags($new_instance['title']) : '',
			'recipient' => (!empty($new_instance['recipient'])) ? strip_tags($new_instance['recipient']) : '',
			'subject'	=> (!empty($new_instance['subject'])) ?   strip_tags($new_instance['subject']) : '',
			
		
		);
		return $instance;
	}
}
?>