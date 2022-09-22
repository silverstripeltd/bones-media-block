<div class="media-block">
    <div class="media-block__container">
        <div class="media-block__content media-block--$FitSizeClasses">
            <% if $MediaType == 'Image' && $Image %>
                <div class="media-block__image-container">
                    <picture>
                        <source media="(min-width:650px)" srcset="$Image.FitMax($Image.Width,$Image.Height).URL">
                        <source media="(min-width:465px)" srcset="$Image.FitMax($Image.Width,$Image.Height).URL">
                        <img src="$Image.FitMax($Image.Width,$Image.Height).URL" class="media-block__image" alt="$Image.Title" loading="lazy">
                    </picture>
                </div>
            <% else %>
                <% if $VideoLink %>
                    <div class="media-block__video-container">
                        $VideoLink.RAW
                    </div>
                <% end_if %>
            <% end_if %>
        </div>
    </div>
</div>