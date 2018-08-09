<?php $browsePages = Voyager::can('browse_pages'); ?>

@if($browsePages)
    You can browse pages
@else
    You cannot browse pages
@endif
