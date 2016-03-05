<div class="control-group" >
          <div class="controls">
              <select style="width:100%;"  class="m-wrap chosen" name="flat" id="flat"  data-placeholder="Choose a Category"   tabindex="1">
                 <option value="">--Flat--</option>
                  <?php
										
										foreach ($result3 as $db) 
										{
 										  $flat_id=$db['flat']["flat_id"];
										  $flat_name=$db['flat']["flat_name"];
										  $flat_name=ltrim($flat_name,'0');
										 ?>
                 <option value="<?php echo $flat_id; ?>"><?php echo $flat_name; ?></option>
                 <?php } ?>
             </select>
          </div>
      </div>