$(document).ready(function (){

    var url = $('#url').val();
    $('.dtable').DataTable();
    $(document).on('click', '#addmodal', function () {
alert("yes");
        $('.modal').modal('show');
        $('#state').text('Save').val('save');
        $("#modal-title").text("Add New");
    });
    $(document).on('click', '.del', function () {

        var id = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var   url = $('#url').val();
                var my_url = url + "/delete";

                alert(my_url);
                $.ajax({
                    type: 'post',
                    url: my_url,
                    data: {
                        id: id,
                    },

                    success: (data) => {
                        console.log(data);

                        $(".table").load(location.href + " .table");
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )

                    },
                    error: function (data) {
                        console.log(data)

                    }
                });

            }
        });
    });


    $('#form4submit').submit(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = new FormData(this);
        var state = $('#state').val();

        if (state === "save") {
            var my_url = url + "/create";

        } else if (state === "update") {
            my_url = url + "/update";
        } else {
            my_url = $('#adurl').val();
        }
alert(my_url);
        $.ajax({
            type: 'post',
            url: my_url,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);

                $(".table").load(location.href + " .table");
                $('#form4submit').trigger("reset");
                $('.modal').modal('hide');

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Added successfully',
                    showConfirmButton: false,
                    timer: 1500
                });


            },
            error: function (data) {
                console.log(data)

            }
        });
    });

    $(document).on('click', '.edit', function () {

        var state = $(this).val();
        var my_url = url + '/edit/' + state;
        alert(my_url);
        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                console.log(data);
                $('.modal').modal('show');
               $('#state').text('Update').val('update');
               $("#modal-title").text("View/Update");

                $("#inid").val(data.ms.id);
                switch (data.m) {
                    case "student":
                        $('#s_name').val(data.ms.s_name);
                        break;

                        case "subscriptionpack":
                     $('packagename').val(data.ms.packagename);
                $("#packagename").val(data.ms.packagename).trigger('change');
                break;

                case "client":
                    $('clientname').val(data.ms.clientname);
                    $('email').val(data.ms.email);
                    $('clientid').val(data.ms.clientid);
                    $('packageid').val(data.ms.packageid);
                    $('expirydate').val(data.ms.expirydate);
               $("#clientname").val(data.ms.clientname).trigger('change');
               break;

               case "studentdetail":
                     //   $('#class').val(data.ms.class);
                      //  $('#gender').val(data.ms.gender);

                        //only for select option we have to use this code
                        $("#class").val(data.ms.class).trigger('change');
                        $("#gender").val(data.ms.gender).trigger('change');
                        $("#student_id").val(data.ms.student_id).trigger('change');
                        break;

                    case "family":
                        $("#student_id").val(data.ms.student_id).trigger('change');
                        $('#parents_name').val(data.ms.parents_name);
                        $('#address').val(data.ms.address);
                        break;
                    default:
                        console.log('Data Not Found');
                }


            },
            error: function (data) {
              //  toastr.error('Data Load Failed')
            }
        });
    });


// Status Change

    $(document).on('click', '.st', function () {
        var state = $(this).val();
        var my_url = url + '/status/' + state;
alert(my_url)
        $.ajax({
            type: 'get',
            url: my_url,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $(".table").load(location.href + " .table");
                console.log(data);
                setTimeout(function () {
                    Swal.fire(
                        'Good job!',
                        data.info,
                        'success'
                    )
                }, 300);
            },
            error: function (data) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                })
            }
        });
    });


});
