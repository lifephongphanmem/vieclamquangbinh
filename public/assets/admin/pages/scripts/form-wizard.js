var FormWizard = function () {


    return {
        //main function to initiate the module
        init: function () {
            $('#form_wizard').bootstrapWizard({
                onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    //$('#rootwizard .progress-bar').css({width:$percent+'%'});
                    $('#rootwizard').find('.bar').css({width: $percent + '%'});
                },'onTabClick': function(tab, navigation, index) {
                    // select id of current tab content
                    var $id = tab.find("a").attr("href");
                    var $approved = 1;
                    // Check all input validation - pass valid if input has class 'passvalid'
                    /**
                     $($id + " input:not(.passvalid)").each(function(){
                if (!$(this).val()) {
                    $(this).parent().addClass('state-error');
                    $approved = 0;
                }
            });
                     */
                    if ($approved !== 1) return false;
                    // Add class visited to style css
                    if (tab.attr("class")=="visited"){
                        tab.removeClass("visited");
                    } else {
                        tab.addClass("visited");
                    }
                }, onTabShow: function(tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index+1;
                    var $percent = ($current/$total) * 100;
                    $('#form_wizard .progress-bar').css({width:$percent+'%'});
                },'tabClass': 'bwizard-steps-o','nextSelector': '.button-next', 'previousSelector': '.button-previous'
            });
            window.prettyPrint && prettyPrint();

            function format(state) {
                if (!state.id) return state.text; // optgroup
                return "<img class='flag' src='../../assets/global/img/flags/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
            }

        }

    };

}();