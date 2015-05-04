<?php
$permissions = $this->session->gets('permissions');
?> 
<?php foreach ($this->eventFlyers as $eventFlyers) { ?>
<li id="photoid_<?php echo $eventFlyers['flyer_id']; ?>">
    <a href="<?php echo SITEURL; ?>uploads/eventsflyers/<?php echo $eventFlyers['event_id']?>/<?php echo $eventFlyers['flyer_file']?>" rel="prettyPhoto" title="Description of image">
        <div>
            <img src="<?php echo SITEURL; ?>uploads/eventsflyers/<?php echo $eventFlyers['event_id']?>/<?php echo "thumb_".$eventFlyers['flyer_file']?>" alt="" />
            <i></i>
        </div>
    </a>
    <div class="gallery-tools">
        <?php if(in_array($this->flyersModuleId, $permissions['edit'])) { ?>
        <a href="#" title="<?php echo $eventFlyers['flyer_title']?>" description="<?php echo $eventFlyers['flyer_desc']?>" url="<?php echo $eventFlyers['flyer_id']?>" class="eventphoto_edit"><i class="icon-pencil"></i></a>
        <?php } ?>
        <?php if(in_array($this->flyersModuleId, $permissions['delete'])) { ?>
        <a href="#" title="<?php echo $eventFlyers['flyer_title']?>" url="<?php echo $eventFlyers['flyer_id']?>" class="eventphoto_delete"><i class="icon-trash"></i></a>
        <?php } ?>
    </div>
</li>
<?php } ?>