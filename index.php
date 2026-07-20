<?php
require_once "functions.php";
include __DIR__ . "/src/views/partials/header.php";

if (!$session->is_signed_in()) {
    redirect("/login.php");
}

// Get signed in username
$user = User::find_by_id($_SESSION['user_id']);
$users_name = $user[0]->name;

// Get files
$files = Upload::find_all();

// Upload files
$success = "";
if(isset($_POST['submit'])) {
    $uploadErrors = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML f...",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload.",
    );

    $tempName = $_FILES['add_document']['tmp_name'];
    $theFile = $_FILES['add_document']['name'];
    $directory = "resources/uploads";

    if (!$theFile === "") {
        // append data to files db
        $upload = new Upload();
        $upload->name_of_file = $_POST['document_name'];
        $upload->filename = $theFile;
        $upload->file_path = "resources/uploads/" . $theFile;
        $upload->user_id = $_SESSION['user_id'];
        $upload->upload_date = date("d/m/Y");
        $upload->type = substr($theFile, strpos($theFile, ".") + 1);
        $upload->create();
        
        // append data to history
        $history_log_item = new History();
        $history_log_item->date = date("d/m/Y");
        $history_log_item->user_id = $_SESSION['user_id'];
        $history_log_item->action = "Uploaded file";
        $history_log_item->filename = $_POST['document_name'];
        $history_log_item->type = $theFile;
        $history_log_item->create();
    } else {
        $theError = $_FILES['add_document']['error'];
        $theMessage = $uploadErrors[$theError];
    }

    // error logging
    if(move_uploaded_file($tempName, $directory . "/" . $theFile)) {
        $success = true;
    } else {
        $theError = $_FILES['add_document']['error'];
        $theMessage = $uploadErrors[$theError];
    }
}
?>

<div class="dashboard-block">
    <?php include __DIR__ . "/src/views/partials/index_nav.php"; ?>

    <div class="page-content">
        <?php 
            if(!empty($theMessage)) {
                echo "<h2 style=\"color: red;\">{$theMessage}</h2>";
            } else if($success) {
                echo "<h2 style=\"color: green;\">File uploaded successfully</h2>";
            }
        ?>

        <section class="welcome-block">
            <div class="text-cont">
                <h1>Welcome Back <?= $users_name ?? ''; ?></h1>
                <p>Manage & download your documents below</p>
            </div>
            <div class="btn-cont">
                <a href="#" id="uploadFileBtn">
                    Upload File
                    <svg viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 9V11.6667C13 12.0203 12.8595 12.3594 12.6095 12.6095C12.3594 12.8595 12.0203 13 11.6667 13H2.33333C1.97971 13 1.64057 12.8595 1.39052 12.6095C1.14048 12.3594 1 12.0203 1 11.6667V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.3333 4.33333L6.99996 1L3.66663 4.33333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 1V9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <div class="modal">
                    <div class="inner">
                        <div class="top-cont">
                            <div class="text-wrap">
                                <h3 class="title">Upload File</h3>
                                <p>Add your file below and add a file</p>
                            </div>
                            <div class="upload-close-btn">
                                <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="50" height="50" rx="25" fill="#0266FF" fill-opacity="0.1"/>
                                    <path d="M18 18L32 32M32 18L18 32" stroke="#0266FF" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>

                        <form action="index.php" method="post" enctype="multipart/form-data" name="uploadForm" onsubmit="validateForm()">
                            <div class="form-group upload-file">
                                <label for="add_document">Select Document</label>
                                <input id="add_document" type="file" name="add_document" placeholder="Add Document">
                            </div>
                            <div class="form-group document-name">
                                <label for="document_name">Document Name</label>
                                <input id="document_name" type="text" name="document_name" placeholder="Add Document Name">
                            </div>
                            <div class="form-group submit">
                                <input type="submit" name="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="file-uploads">
            <table>
                <thead>
                    <tr>
                        <th class="file-num-title">File No.</th>
                        <th class="file-name">File Name</th>
                        <th class="upload-date">Upload Date</th>
                        <th class="uploaded-by">Uploaded By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($files as $file):
                        $uploadedUser = User::find_by_id($file->user_id);
                        $nameOfUploadedUser = $uploadedUser[0]->name;
                    ?>
                        <tr>
                            <td class="file-num-value">00<?= $file->id ?? ''; ?>#</td>
                            <td class="file-name-value"><?= $file->name_of_file ?? ''; ?></td>
                            <td class="upload-date-value"><?= $file->upload_date ?? ''; ?></td>
                            <td class="uploaded-by"><?= $nameOfUploadedUser ?? ''; ?></td>
                            <td class="download">
                                <a href="<?= "src/php/download.php?id=" . $file->id; ?>" >
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 10.3335V13.4446C15 13.8572 14.8361 14.2528 14.5444 14.5446C14.2527 14.8363 13.857 15.0002 13.4444 15.0002H2.55556C2.143 15.0002 1.74733 14.8363 1.45561 14.5446C1.16389 14.2528 1 13.8572 1 13.4446V10.3335" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4.11111 6.44434L8 10.3332L11.8889 6.44434" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 10.3333V1" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>   
        </section>

        <section class="history">
            <div class="top">
                <p class="title-cont">
                    <svg viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="#3F3F3F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 5V11L15 13" stroke="#3F3F3F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    History
                </p>

                <div class="subtitle">
                    <p>History of files downloaded and uploaded by users</p>
                </div>
            </div>

            <div class="bottom">
                <table>
                    <tbody>
                        <?php 
                        $history_log = History::find_all();
                        foreach ($history_log as $log_item):
                            $user = User::find_by_id($log_item->user_id);
                            $users_name = $user[0]->name;
                            $user_pp = $user[0]->profile_picture ? "/resources/profile-pictures/" . $user[0]->profile_picture : "/resources/profile-pictures/placeholder.webp";
                        ?>
                            <tr>
                                <td class="date-value"><?= $log_item->date ?? ''; ?></td>
                                <td class="history-item">
                                    <div class="user-cont">
                                        <img src="<?= $user_pp ?? ''; ?>">
                                        <div class="name"><?= $users_name ?? ''; ?></div>
                                    </div>
                                    <div class="log-cont">
                                        <p class="action"><?= $log_item->action ?? ''; ?></p>
                                        <a class="file" href="/resources/uploads/<?= $log_item->filename && $log_item->type ? $log_item->filename : ''; ?>" target="_blank">"<?= $log_item->filename ?? ''; ?>"</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>   
            </div>
        </section>
    </div>
</div>

<?php include __DIR__ . "/src/views/partials/footer.php"; ?>