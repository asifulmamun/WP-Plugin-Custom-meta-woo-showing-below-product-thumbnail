<?php 

    namespace Frontend\Elements;

    if(!class_exists('Virus_total_el_single_product')){
        class Virus_total_el_single_product{


            // Before Add to cart
            public static function virus_status_btn_before_add_to_cart_single_page(){

                // Virus Total Status Show if Hash file exist
                echo '<a class="vt_status_check" style="cursor:pointer;" href="#virus_total_full_status_wrap">Files Verified by VirusTotal!</a>'; ?>

                <style>
                    a.vt_status_check{
                        color: var(--virus_total_primary_color);
                    }
                </style>

            <?php }// Before Add to cart


            // After product desc/summery
            public static function after_pdocut_summery_or_desc($data){?>
                <div id="virus_total_full_status_wrap">
                    <a class="btn btn-primary" target="_blank" href="https://www.virustotal.com/gui/search/<?php echo $data; ?>">Check Virus Live</a>
                </div>
                <style>
                    #virus_total_full_status_wrap a{
                        background-color: var(--virus_total_primary_color);
                        color: white;
                    }
                </style>
            <?php }// After product desc/summery

            

        }
    }