

(function ($) {
    /*************** MAIN FUNCTION ***************/
    /*****---------- On Ready ----------*****/
    $(document).ready(function () {
        init();
        onChanges();
        onClicks();
        onFocus();
        onInput();
        onMouseUps();
        onMouseOver();
        onKeyUp();
        onKeyDown();
        onSubmit();
        onLoad();
    });

    /*****---------- INIT ----------*****/
    function init() {

    }

    /*****---------- onChanges ----------*****/
    function onChanges() {
        // $(document).on('change', '.class', function() {

        // });


    }
    /*****---------- onClicks ----------*****/
    function onClicks() {


        // $(document).on('click', '#updateBtn', function() {

        // });


        // Combine both event listeners into one
        $(document).on('click', '#saveEmployeeBtn', function (event) {
            // Prevent the default form submission behavior
            event.preventDefault();
            event.stopPropagation();

            // Perform form validation
            var form = document.querySelector('.needs-validation');
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return; // Exit the function if the form is invalid
            }

            // Retrieve form data
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var email_address = $('#email_address').val();
            var project_assign = $('#project_assign').find(":selected").val();
            var rate = $('#rate').val();


            $.ajax({
                type: 'POST',
                url: 'functions/employee-management/add-employee.php',
                data: {
                    first_name: first_name,
                    last_name: last_name,
                    email_address: email_address,
                    project_assign: project_assign,
                    rate: rate
                },
                success: function (data) {
                    console.log(data);
                    $('.loading-ui').hide();
                    if (data.trim() === "Successful") {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Request has been successfully submitted!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Submission of the request was unsuccessful!',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }
            });
        });


        $(document).on('click', '#timeAddBtn', function (event) {
            event.preventDefault();
            event.stopPropagation();
            var form = $('#addtimeForm');
            if (!form[0].checkValidity()) {

                form.addClass('was-validated');
                return;
            }
            var id = $('#current_id').val();
            var rate = $('#current_rate').val();
            var date = $('#date').val();
            var time_in = $('#time_in').val();
            var time_out = $('#time_out').val();
           

            $.ajax({
                url: "functions/employee-management/add-time.php",
                type: "POST",
                data: {
                    id: id,
                    rate: rate,
                    date: date,
                    time_in: time_in,
                    time_out: time_out
                },
                success: function (data) {
                    console.log(data);
                    $('.loading-ui').hide();
                    if (data.trim() === "Successful") {
                        Swal.fire({
                            title: 'Success!',
                            text: 'Request has been successfully submitted!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Submission of the request was unsuccessful!',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                }

            })

        });


    }

    /***--------- OnFocus ----------*****/
    function onFocus() {
        // $(document).on('focus', '.class', function() {

        // });
    }

    /***--------- OnInput----------*****/
    function onInput() {
        // $(document).on('input', '.class', function() {

        // });

    }

    /***--------- OnMouseUp ----------*****/
    function onMouseUps() {
        // $(document).on('mouseup', '.class', function(e) {

        // });
    }

    /***--------- OnMouseUp ----------*****/
    function onMouseOver() {
        // $(document).on('mouseover', '.class', function(e) {

        // });
    }

    /***--------- OnKeyUp ----------*****/
    function onKeyUp() {
        // $( document ).on( 'keyup', '.class', function(e) {

        // });
    }

    /***--------- OnKeyDown ----------*****/
    function onKeyDown() {
        $(document).on('keydown', '.class', function (e) {

        });
    }

    /****--------- OnSubmit ----------*****/
    function onSubmit() {
        // $(document).on('submit', '.class', function(e){

        // });
    }


    /**------------- onLoad -------------**/
    function onLoad() {
        // code here
    }



    /**------------- Equalize Height -------------**/
    /** EQUALIZE HEIGHT OF AN ELEMENTS
     *
     * @param     {<type>}  elem    The element
     */
    // window.equalizeHeight = function(elem) {
    //     var arr = [];
    //     var a = 0;
    //     $(elem).each(function() {
    //         arr[a++] = $(this).outerHeight();
    //     });
    //     var largest = Math.max.apply(Math, arr);
    //     $(elem).each(function() {
    //         $(this).css({
    //             'min-height': largest
    //         });
    //     });
    // };

    // usage equalizeHeight('.class');

    /**------------- Window Resize -------------**/
    // $(window).resize(function() { });

})(jQuery);