<?php

namespace Frontend\Elements;

if(!class_exists('Mini_Status_woo_header')){
    class Mini_Status_woo_header {
        public static function mini_status() {?>
        
            <!-- Product Mini Status -->
            <section class="container product_mini_status">
                <ul class="row">


                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Auto Update</div>
                            <div><a target="_blank" href="/how-to-update/">Yes (1 Year)?</a></div>
                        </div>
                    </li>
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Mannual Update</div>
                            <div><a target="_blank" href="/how-to-update-manually/">Yes (1 Year)?</a></div>
                        </div>
                    </li>

                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/hj38MWnT/Screenshot-from-2024-03-15-00-44-35.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Version</div>
                            <div>20.0.2 <sup><a target="_blank" href="/contact-version">Update?</a></sup></div>
                        </div>
                    </li>
                    
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/pV4YFHqt/Screenshot-from-2024-03-15-00-45-15.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Update On</div>
                            <div>March 14, 2024</div>
                        </div>
                    </li>
                </ul>
            </section>
            <!-- / Product Mini Status -->

            <style>
                /* Product Mini Status */
                .product_mini_status{
                    padding: 2rem .8rem;
                }
                .product_mini_status li{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .product_mini_status .mini_status_desc div:first-child{
                    color: var(--custom_secondary_color);
                    font-weight: 600;
                }
                .product_mini_status .mini_status_desc div:last-child{
                    color: var(--custom_secondary_txt);
                }
                .product_mini_status .mini_status_desc div:last-child sup a{
                    text-transform: uppercase;
                    color: var(--custom_optional_color);
                }
            </style>
            
        <?php }
    }
}


