
<?php

foreach($properties as $property){ ?>
	<div class="my-properties" id="property-<?= $property['id']; ?>" style='display:none;' >
		<input type='hidden' name='property_id' id='property_id_<?php echo $property['id']; ?>' value='<?php  echo  $property['id']; ?>'>
			<div class="my-properties__left">
				<div class="my-properties__img lazyload" data-sizes="auto" data-bgset="{{ url('/storage/Property/'.$property['id'].'/thumbs/'.$property['filename']) }} 1x, {{ url('/storage/Property/'.$property['id'].'/thumbs/'.$property['filename']) }} 2x" style='background-image: url({{ asset("/frontend/images/thumb-loquare.png") }});'></div>
			</div>
			<div class="my-properties__center">
				<a href="{{ url('/rent/property/'.$property['id']) }}" class="my-properties__title"><?php  echo  $property['direccion'];?></a>
				<div class="my-properties__top">
					<div class="my-properties__info">ID number: <?php    echo $property['ref']; ?> </div>
					
					<div class="my-properties__info">
						<?php 
						 if($property['property_deal'] == 'SALE'){ echo "New "; }else{ echo "Used "; }
							echo $property['property_type'];
						?></div>
					
					<div class="my-properties__info">Published: <?php echo date('d/m/Y', strtotime($property['created_at']));
						 											?></div>
				</div>
				<div class="my-properties__price">€ <?php   echo  $property['price'];?><?php  if($property['property_deal'] == 'RENT'){ echo "/mo"; }else{ echo ""; }?></div>
				<div class="my-properties__desc">
					<div><?php   echo $property['rooms']; ?> bed, <?php echo  $property['bathrooms']; ?> baths, <?php echo $property['sizem2']; ?> m<sup>2</sup></div>
				</div>
				<div class="my-properties__equip">
					
					 <?php
                            $features = array(
                                    "furnished" => array(
                                            "name" => "Furnished",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-furniture.svg')
                                    ),
                                    "heating" => array(
                                            "name" => "Heating",
                                            "icon" =>asset('/frontend/assets/icons/icon-25x25-heating.svg')
                                    ),
                                    "elevetor" => array(
                                            "name" => "Elevator",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-elevator.svg')
                                    ),
                                    "outdoor_space" => array(
                                            "name" => "Outdoor",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-outdoor.svg')
                                    ),
                                    "dishwasher" => array(
                                            "name" => "Dishwasher",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-dishwasher.svg')
                                    ),
                                    "central_ac" => array(
                                            "name" => "Central a/c",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-ac.svg')
                                    ),
                                    "pool" => array(
                                            "name" => "Pool",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-pool.svg')
                                    ),
                                    "doorman" => array(
                                            "name" => "Doorman",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-doorman.svg')
                                    ),
                                    "gym" => array(
                                            "name" => "Gym",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-gym.svg')
                                    ),
                                    "pets" => array(
                                            "name" => "Pets",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-pets.svg')
                                    ),
                                    "dogs" => array(
                                            "name" => "Dogs",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-dogs.svg')
                                    ),
                                    "laundry" => array(
                                            "name" => "Laundry",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-laundry.svg')
                                    ),
                                    "cats" => array(
                                            "name" => "Cat",
                                            "icon" => asset('/frontend/assets/icons/icon-25x25-cat.svg')
                                    ),
                                    "others" => array(
                                            "name" => "Other",
                                            "icon" => ""
                                    )
                            );
                            ?>
						<?php foreach($features as $feature => $value){ if($property[$feature] == 1) { ?>
					 <?php if($value['icon'] != "") { ?>
					<div class="my-properties__equip-item">
							 <img src="<?php echo $value['icon']; ?>"/>
					</div>
						<?php } } } ?>
				</div>
			</div>
			<div class="my-properties__right">
					<div class="switcher">
						
						<input type="checkbox" class='property_status' data-id='<?php echo $property['id']; ?>' id="property_status_<?php echo $property['id']; ?>" name="pub" value='<?php echo $property['status'];?>' <?php echo $property['status'] == 1?"checked":"";?>>
						<label for="property_status_<?php echo $property['id']; ?>">
							<span class="switcher__control"></span>
							<span class="switcher__text">
								<div class="switcher__text-inner">
									<div>UnPublished</div>
									<div>Published</div>
								</div>
							</span>
						</label>
					</div>
					<div class="my-properties__actions">
                        <a href="#" class="my-properties__action">
                            <span class="icon icon--offers icon--offers-new"></span>
                            offers(12)
                        </a>
                         <a href="{{ url('/property/edit/'.$property['id']) }}" class="my-properties__action">
                            <span class="icon icon--edit"></span>
                            edit property
                        </a>
                        <a href="javascript:void(0)"  data-id="<?php echo $property['id']; ?>" data-mfp-src="#delete-property" class="my-properties__action js-popup-open delete_property_popup">
                            <span class="icon icon--trash"></span>
                            delete property
                        </a>
                    </div>
			</div>
			
		</div>
		
<?php      }  ?> 
 		
<script>
	$(document).ready(function(){

		$('.property_status').change(function()
		 {
			var property=$(this).data('id');
			$.ajax({
					url:basepath+'/property/publish',
					type:'POST',
					data:{
							"id":property,
							"status":($('#property_status_'+property).prop('checked'))?"1":"0",
						 	"_token" : $('input[name="_token"]').val()
						}
				});
			
		});
		
	});
	
</script>