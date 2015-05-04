<?php foreach ($this->galleryImages as $galleryImages) { ?>
<li id="photoid_<?php echo $galleryImages['image_id']; ?>">
    <a href="<?php echo SITEURL; ?>uploads/eventsphotos/<?php echo $galleryImages['gallery_id']?>/<?php echo $galleryImages['image_file']?>" rel="prettyPhoto" title="Description of image">
        <div>
            <img width="180" height="130" src="<?php echo SITEURL; ?>uploads/eventsphotos/<?php echo $galleryImages['gallery_id']?>/<?php echo $galleryImages['image_file']?>" alt="" />
            <i>Hello How r u</i>
        </div>
    </a>
    <div class="gallery-tools">        
        <a href="#" title="<?php echo $galleryImages['image_title']?>" description="<?php echo $galleryImages['image_desc']?>" url="<?php echo $galleryImages['image_id']?>" class="eventphoto_edit"><i class="icon-pencil"></i></a>               
        <a href="#" title="<?php echo $galleryImages['image_title']?>" url="<?php echo $galleryImages['image_id']?>" class="eventphoto_delete"><i class="icon-trash"></i></a>
    </div>
</li>
<?php } ?>