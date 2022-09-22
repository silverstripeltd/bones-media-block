import { storiesOf } from "@storybook/vue3";
import image from "./assets/placeholder.png";

storiesOf("Components", module)
    .add("MediaBlock. Image - Full size", () => ({
        template: `
        <div class="media-block">
            <div class="media-block__container">
                <div class="media-block__content media-block--full">
                    <div class="media-block__image-container">
                        <picture>
                            <source media="(min-width:650px)" srcset="${image}">
                            <source media="(min-width:465px)"
                                srcset="${image}">
                            <img src="${image}" alt="test v2" loading="lazy">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
        `,
    }))
    .add("MediaBlock. Image - Contained size", () => ({
        template: `
        <div class="media-block">
            <div class="media-block__container">
                <div class="media-block__content media-block--contained">
                    <div class="media-block__image-container">
                        <picture>
                            <source media="(min-width:650px)"
                                srcset="${image}">
                            <source media="(min-width:465px)"
                                srcset="${image}">
                            <img src="${image}" class="media-block__image" alt="test v4" loading="lazy">
                        </picture>
                    </div>
                </div>
            </div>
        </div>
        `,
    }))
    .add("MediaBlock. Video - Full size", () => ({
        template: `
        <div class="media-block">
            <div class="media-block__container">
                <div class="media-block__content media-block--full">
                    <div class="media-block__video-container"><iframe width="560" height="315"
                            src="https://www.youtube.com/embed/lS0WBxL6tUk" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe></div>
                </div>
            </div>
        </div>
        `,
    }))
    .add("MediaBlock. Video - Contained size", () => ({
        template: `
        <div class="media-block">
            <div class="media-block__container">
                <div class="media-block__content media-block--contained">
                    <div class="media-block__video-container"><iframe width="560" height="315"
                            src="https://www.youtube.com/embed/lS0WBxL6tUk" title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen=""></iframe></div>
                </div>
            </div>
        </div>
        `,
    }));
