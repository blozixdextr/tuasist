<div id="content" class="container">
	
		<div class="col-xs-10 col-xs-offset-1 task-form-container whiteContainer">
        <h2>Welcome to <?php echo $site_name; ?></h2>
        <h4></h4>
        	<center>
            	<blockquote>Select Are you a Job Rabbit or Job Poster?</blockquote>
                    <?php echo form_open(base_url().'home/choose_type/update_user' , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
							<select name="user_type" >
                                      	<option value="1">Worker</option>
                                    	<option value="2">Poster</option>
                                        <!--<option value="3">Worker/Poster</option>-->
                                    </select>
                                <br/>
								<br/>
									<input name="submit" type="submit" value="Submit">
								
							</form>
        </center>              
        </div>
</div>