<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reading Lecttuce</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
    <link src='https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css' rel="stylesheet">
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js'></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
    <script src="../tinymce/tinymce.min.js"></script>
</head>
<style>
    .main {
        margin-top: 30px;
        padding: 0px 10px;
    }
</style>

<?php
include_once 'partitials/admin_sideMenu.php';
?>

<body>


    <div class="main">
        <h2 class="text-center">Add new reading lecttuce</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add new reading lecttuce</strong>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Lecttuce name" class=form-control-lable>
                                        Lecttuce name
                                    </label>
                                    <input type="text" id="lecttuces_name" class="form-control" name="lecttuces_name">
                                </div>

                                <div class="form-group">
                                    <label for="New reading" class="form-control-lable">
                                        Reading passage
                                    </label>
                                    <!-- <textarea class="form-control" name="reading_url" id="reading_url" cols="30"
                                        rows="10" id="full-featured-non-premium"></textarea> -->
                                    <textarea class="form-control" name="reading_url" id="mytextarea"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="Keywords" class=form-control-lable>
                                        Keywords (for searching)
                                    </label>
                                    <input type="text" id="lecttuces_keyword" class="form-control"
                                        name="lecttuces_keyword">
                                </div>

                                <div class="form-group">
                                    <label for="Discription" class=form-control-lable>
                                        Discription
                                    </label>
                                    <input type="text" id="lecttuces_discription" class="form-control"
                                        name="lecttuces_discription">
                                </div>

                                <div class="form-group">
                                    <label for="Level" class=form-control-lable>
                                        Level
                                    </label>
                                    <select type="text" id="level" class="form-select" name="level">
                                        <option select>Select level</option>

                                        <?php
                                        $level_all = "select * from level";
                                        $result_level = $conn->query($level_all);
                                        while ($level_row = mysqli_fetch_assoc($result_level)) {
                                            $level = $level_row['level'];
                                            ?>
                                            <option value="<?php echo $level ?>">
                                                <?php echo $level ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="Category" class=form-control-lable>
                                        Category
                                    </label>
                                    <select type="text" id="category_title" class="form-select" name="category_title">
                                        <option select>Select a category</option>

                                        <?php
                                        $category_all = "select * from category";
                                        $result_category = $conn->query($category_all);
                                        while ($category_row = mysqli_fetch_assoc($result_category)) {
                                            $category_title = $category_row['category_title'];
                                            ?>
                                            <option value="<?php echo $category_title ?>">
                                                <?php echo $category_title ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" class="btn btn-success" name="submit" value="Save question">
                                </div>
                            </div>
                            <form>

                    </div>
                </div>
            </div>

            <table id="data" class="table table-border" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Reading Passage</th>
                        <th scope="col">Keywords</th>
                        <th scope="col">Level</th>
                        <th scope="col">Category</th>
                        <th scope="col">Add quiz for lesson</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "select * from lecttuces where reading_url !='';";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $lecttuces_id = $row["lecttuces_id"];
                        $lecttuces_name = $row["lecttuces_name"];
                        $reading = $row["reading_url"];
                        $lecttuces_keyword = $row["lecttuces_keyword"];
                        $level = $row['level'];
                        $category_title = $row['category_title'];
                        ?>
                        <tr>
                            <td>
                                <?php echo $lecttuces_id ?>
                            </td>
                            <td>
                                <?php echo $lecttuces_name ?>
                            </td>
                            <td>
                                <?php echo $reading ?>
                            </td>
                            <td>
                                <?php echo $lecttuces_keyword ?>
                            </td>
                            <td>
                                <?php echo $level ?>
                            </td>
                            <td>
                                <?php echo $category_title ?>
                            </td>
                            <td>
                                <a href="add_lecttuces_quiz.php?id=<?php echo $lecttuces_id ?>"><i
                                        class="fa-solid fa-plus"></i></a>
                            </td>
                            <td>
                                <a href="edit_reading_lecttuce.php?id=<?php echo $lecttuces_id ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_reading_lecttuce.php?id=<?php echo $lecttuces_id ?>"><i
                                        class="fa-solid fa-trash"></i></a>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>


    <?php
    add_reading_lecttuce();
    ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>


    <script>
        new DataTable('#data');
    </script>
    <!-- <script>
        tinymce.init({
            selector: 'textarea#full-featured-non-premium',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            link_list: [
                { title: 'My page 1', value: 'http://www.tinymce.com' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_list: [
                { title: 'My page 1', value: 'http://www.tinymce.com' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
                }
            },
            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 520,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
        });
    </script> -->
    <script>
        tinymce.init({
            selector: "#mytextarea",
            height: 400,
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
        });
    </script>

</body>

</html>