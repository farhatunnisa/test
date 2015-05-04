<?php
$permissions = $this->session->gets('permissions');
?> 
<?php foreach ($this->eventPhotos as $eventPhotos) { ?>
<li id="photoid_<?php echo $eventPhotos['photo_id']; ?>">
    <a href="<?php echo SITEURL; ?>uploads/eventsphotos/<?php echo $eventPhotos['event_id']?>/<?php echo $eventPhotos['photo_file']?>" rel="prettyPhoto" title="Description of image">
        <div>
            <img src="<?php echo SITEURL; ?>uploads/eventsphotos/<?php echo $eventPhotos['event_id']?>/<?php echo "thumb_".$eventPhotos['photo_file']?>" alt="" />
            <i>Hello How r u</i>
        </div>
    </a>
    <div class="gallery-tools">
        <?php if(in_array($this->photosModuleId, $permissions['edit'])) { ?>
        <a href="#" title="<?php echo $eventPhotos['photo_title']?>" description="<?php echo $eventPhotos['photo_desc']?>" url="<?php echo $eventPhotos['photo_id']?>" class="eventphoto_edit"><i class="icon-pencil"></i></a>
        <?php } ?>
         <?php if(in_array($this->photosModuleId, $permissions['delete'])) { ?>
        <a href="#" title="<?php echo $eventPhotos['photo_title']?>" url="<?php echo $eventPhotos['photo_id']?>" class="eventphoto_delete"><i class="icon-trash"></i></a>
         <?php } ?>
    </div>
</li>
<?php } ?>