		<div class="row">
			<div class="col-lg-6">
				<div class="mt-5">
					 <div class="mb-6">
						<h4 class="header-title mb-3">Select Booking Timeing</h4>
					 
						

						<div id='outer_booking'><h2>Available Slots</h2>
							
						<?php 
						
						$today =date("d-m-y H:i");
						$startTime=	date("d-m-y H:i");
						
						//print_r($today);
						//print_r($startTime);
						
						if($today == $startTime) { 

								
						$booking_start_time= date('d-m-y H:i',strtotime('+1 hour',strtotime($startTime)));//date("Y/m/d H:i:s", strtotime("+30 minutes");			// The time of the first slot in 24 hour H:M format  
						$booking_end_time            = "17:00"; 			// The time of the last slot in 24 hour H:M format  
						$booking_frequency           = 29;   			    // The slot frequency per hour, expressed in minutes.  	
						// Day Related Variables

						 $day_format					= 1;				// Day format of the table header.  Possible values (1, 2, 3)   
																					// 1 = Show First digit, eg: "M"
																					// 2 = Show First 3 letters, eg: "Mon"
																					// 3 = Full Day, eg: "Monday"
							
						 $day_closed					= array("Saturday", "Sunday"); 	// If you don't want any 'closed' days, remove the day so it becomes: = array();
						 $day_closed_text				= "CLOSED"; 		// If you don't want any any 'closed' remove the text so it becomes: = "";
							$slots=array();
							$start='';
							echo "<h3>Date " . date("d-m-y") . "</h3><br>";
							
							// Create $slots array of the booking times
							for($i = strtotime($booking_start_time); $i<= strtotime($booking_end_time); $i = $i + $booking_frequency * 30) {
								$slots[] = date("H:i", $i);  
							}			
							// Loop through $this->bookings array and remove any previously booked slots
							// Close if
							// Loop through the $slots array and create the booking table
							
							foreach($slots as $i => $start) {			

								// Calculate finish time
								$finish_time = strtotime($start) + $booking_frequency * 60; 
							
							?>
								<tr>
								
									<td width='110'><input data-val="<?php echo $start .'-'. date("H:i", $finish_time) ?>" class='fields' name="slot[]" type='radio'></td>
									<td>  <?php echo $start ?></td>
									<td>  <?php echo date("H:i", $finish_time) ?> </td>
									
									
								</tr>
							
							<?php } // Close foreach			
						 }
						?>
						<hr>
						

					
						<?php 
						
						$today =date("d-m-y H:i");
						$datetime = new DateTime('tomorrow');
						$tomorrow= $datetime->format('d-m-y');
						
						echo "<h3>Date ".$tomorrow."</h3><br>";
						
						
						if($today != $tomorrow) { 

							
						//$startTime1=date("Y-m-d H:i",strtotime($datetime));
						//$booking_start_time1= date('Y-m-d H:i',strtotime('+1 hour',strtotime($datetime)));
						$booking_start_time1          = "07:30";			// The time of the first slot in 24 hour H:M format  
						 $booking_end_time1            = "17:00"; 			// The time of the last slot in 24 hour H:M format  
						 $booking_frequency1           = 29;   			// The slot frequency per hour, expressed in minutes.  	
						// Day Related Variables

						 $day_format1					= 1;				// Day format of the table header.  Possible values (1, 2, 3)   
																					// 1 = Show First digit, eg: "M"
																					// 2 = Show First 3 letters, eg: "Mon"
																					// 3 = Full Day, eg: "Monday"
							
						 $day_closed1					= array("Saturday", "Sunday"); 	// If you don't want any 'closed' days, remove the day so it becomes: = array();
						 $day_closed_text1				= "CLOSED"; 		// If you don't want any any 'closed' remove the text so it becomes: = "";





							// Create $slots array of the booking times
							for($i = strtotime($booking_start_time1); $i<= strtotime($booking_end_time1); $i = $i + $booking_frequency * 60) {
								$slots1[] = date("H:i", $i);  
							}			
							// Loop through $this->bookings array and remove any previously booked slots
							// Close if
							
							// Loop through the $slots array and create the booking table
							
							foreach($slots1 as $i => $start1) {			

								// Calculate finish time
								$finish_time1 = strtotime($start1) + $booking_frequency1 * 60; 
							
							?>
								<tr>
								
									<td width='110'><input data-val="<?php echo $tomorrow.'-'.$start1 .' - '. date("H:i", $finish_time1) ?>" class='fields' name="slot[]" type='radio'></td>
									<td>  <?php echo $start1 ?></td><td>&nbsp<?php echo '-' ?>
									<td>  <?php echo date("H:i", $finish_time1) ?> </td>
									
									
								</tr>
							
							<?php } // Close foreach			
						}
							?>
						<hr>

					
						
						
						
					</table>
					</div>
					
					
					<!-- Close outer_booking DIV -->

					</div>
				</div>
			</div>
		</div>