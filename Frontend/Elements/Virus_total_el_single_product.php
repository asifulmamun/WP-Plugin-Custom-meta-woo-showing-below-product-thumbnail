<?php 

    namespace Frontend\Elements;

    if(!class_exists('Virus_total_el_single_product')){
        class Virus_total_el_single_product{


            // Before Add to cart
            public static function virus_status_btn_before_add_to_cart_single_page(){

                // Virus Total Status Show if Hash file exist
                echo '<a class="vt_status_check" style="cursor:pointer;" href="#virus_total_full_status_wrap"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" /></svg>&nbsp;Files Verified by VirusTotal!
                </a>'; ?>

                <style>
                    a.vt_status_check{
                        color: var(--virus_total_primary_color);
                        display: flex;
                    }
                    a.vt_status_check svg{
                        width: 1.5rem;
                    }
                </style>

            <?php }// Before Add to cart


            // After product desc/summery
            public static function after_pdocut_summery_or_desc($data){?>
                <div id="virus_total_full_status_wrap">
                    <a class="btn btn-primary" target="_blank" href="https://www.virustotal.com/gui/search/<?php echo $data; ?>">Check Virus Status Live</a>
                </div>
                <style>
                    #virus_total_full_status_wrap a{
                        background-color: var(--virus_total_primary_color);
                        color: white;
                    }
                    #virus_total_full_status_wrap svg{
                        color: var(--virus_total_primary_color);
                    }
                </style>
            <?php }// After product desc/summery

            

        }
    }