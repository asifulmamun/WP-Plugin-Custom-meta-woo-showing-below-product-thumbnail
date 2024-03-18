<?php

namespace Frontend\Elements;
// use Frontend\Data\Get_meta as GM; // get meta but not required, it's pursing from calling time

if(!class_exists('Mini_Status_woo_header')){
    class Mini_Status_woo_header {

        /**
         *  mini_status($au, $mu, $version, $uo)
         *  Where $au - Auto Update, $mu- Mannual Update, $version - version, $uo - Update On
         *  mini_status(11years, $12years, '3.2.0', '2024-03-25') - Formate (11year/01years - first 1/0 means true/false)
         *  @package wp-premium.org
         */
        public static function mini_status($au, $mu, $version, $uo) {?>
            <section class="container product_mini_status">
                <ul class="row">
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Auto Update</div>
                            <div>
                                <a target="_blank" href="/how-to-update/">
                                    <?php
                                        // $au = GM::get_meta('auto_update'); // field - auto_update
                                        preg_match('/^(\d|[^0-9])/', $au, $matches); // Match the pattern against the meta_value

                                        // Status Check and data Devide
                                        if (isset($matches[0])) {
                                            
                                            $status = $matches[0]; // If a match is found, extract the first digit/character
                                            $status_data = substr($au, strlen($status)); // Now, extract all characters after the first digit/character
                                        } else {
                                            
                                            $status = 0;
                                            $status_data = '';
                                        }
                                        // Status Print
                                        if($status == 1){

                                            echo 'Yes';
                                            echo ", $status_data ?"; // Extra Text - DATA
                                        } else{
                                            echo 'No';
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Mannual Update</div>
                            <div>
                                <a target="_blank" href="/how-to-update-manually/">
                                <?php
                                        // $mu = GM::get_meta('mannual_update'); // field - mannual_update
                                        preg_match('/^(\d|[^0-9])/', $mu, $matches); // Match the pattern against the meta_value

                                        // Status Check and data Devide
                                        if (isset($matches[0])) {
                                            
                                            $status = $matches[0]; // If a match is found, extract the first digit/character
                                            $status_data = substr($mu, strlen($status)); // Now, extract all characters after the first digit/character
                                        } else {
                                            
                                            $status = 0;
                                            $status_data = '';
                                        }
                                        // Status Print
                                        if($status == 1){

                                            echo 'Yes';
                                            echo ", $status_data ?"; // Extra Text - DATA
                                        } else{
                                            echo 'No';
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/hj38MWnT/Screenshot-from-2024-03-15-00-44-35.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Version</div>
                            <div>
                                <?php echo $version/* GM::get_meta('product_version') */; // field ?>
                                </a>
                                <sup><a target="_blank" href="/contact-version">Update?</a></sup>
                            </div>
                        </div>
                    </li>
                    
                    <li class="col-6 col-lg-3 col-md-3">
                        <img src="https://i.postimg.cc/pV4YFHqt/Screenshot-from-2024-03-15-00-45-15.png" alt="Auto Update">
                        <div class="mini_status_desc">
                            <div>Update On</div>
                            <div>
                            <?php

                                // $uo = GM::get_meta('custom_product_update_on'); // field
                                $dateTime = new \DateTime($uo);
                                echo $dateTime->format('F d, Y'); // Output: March 23, 2024
                            
                            ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </section>
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
