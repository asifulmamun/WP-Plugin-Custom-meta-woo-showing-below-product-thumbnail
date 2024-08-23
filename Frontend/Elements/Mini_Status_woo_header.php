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
                        <!-- <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update"> -->
                        <span class="mini_status_ic">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                            </svg>
                        </span>
                        <div class="mini_status_desc">
                            <div>Auto Update</div>
                            <div>
                                <a target="_blank" href="/how-to-update/">
                                    <?php
                                        // $au = GM::get_meta('auto_update'); // field - auto_update
                                        if($au == null){
                                            $au = 0;
                                        }
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
                        <!-- <img src="https://i.postimg.cc/MTYbBMPP/Screenshot-from-2024-03-15-00-28-42.png" alt="Auto Update"> -->
                        <span class="mini_status_ic">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </span>
                        <div class="mini_status_desc">
                            <div>Mannual Update</div>
                            <div>
                                <a target="_blank" href="/how-to-update-manually/">
                                <?php
                                        // $mu = GM::get_meta('mannual_update'); // field - mannual_update
                                        if($mu == null){
                                            $mu = 0;
                                        }
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
                        <!-- <img src="https://i.postimg.cc/hj38MWnT/Screenshot-from-2024-03-15-00-44-35.png" alt="Auto Update"> -->
                        <span class="mini_status_ic">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </span>
                        <div class="mini_status_desc">
                            <div>Version</div>
                            <div>
                                <?php

                                    if($version != null){
                                        echo $version/* GM::get_meta('product_version') */; // field 
                                    } else{
                                        echo 'N/A';
                                    }
                                ?>
                                </a>
                                <sup><a target="_blank" href="/contact-version">Update?</a></sup>
                            </div>
                        </div>
                    </li>
                    
                    <li class="col-6 col-lg-3 col-md-3">
                        <!-- <img src="https://i.postimg.cc/pV4YFHqt/Screenshot-from-2024-03-15-00-45-15.png" alt="Auto Update"> -->
                        <span class="mini_status_ic">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                        </span>
                        <div class="mini_status_desc">
                            <div>Update On</div>
                            <div>
                            <?php

                                // $uo = GM::get_meta('custom_product_update_on'); // field
                                if($uo != null){
                                    $dateTime = new \DateTime($uo);
                                    echo $dateTime->format('F d, Y'); // Output: March 23, 2024
                                } else{
                                    echo 'N/A';
                                }
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
                
                span.mini_status_ic{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding-right: 1rem;
                }
                span.mini_status_ic svg{
                    color: var(--custom_secondary_color);
                    width: 2.4rem;
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
