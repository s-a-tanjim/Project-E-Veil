<?php
    include("header.php");
    $title = "Write a email";

    $output = str_replace('%TITLE%', $title, $output);
    echo $output;
?>


<style type="text/css">
.email-app {
display: flex;
flex-direction: row;
background: #fff;
border: 1px solid #e1e6ef;
}

.email-app nav {
flex: 0 0 200px;
padding: 1rem;
border-right: 1px solid #e1e6ef;
}

.email-app nav .btn-block {
margin-bottom: 15px;
}

.email-app nav .nav {
flex-direction: column;
}

.email-app nav .nav .nav-item {
position: relative;
}

.email-app nav .nav .nav-item .nav-link,
.email-app nav .nav .nav-item .navbar .dropdown-toggle,
.navbar .email-app nav .nav .nav-item .dropdown-toggle {
color: #151b1e;
border-bottom: 1px solid #e1e6ef;
}

.email-app nav .nav .nav-item .nav-link i,
.email-app nav .nav .nav-item .navbar .dropdown-toggle i,
.navbar .email-app nav .nav .nav-item .dropdown-toggle i {
width: 20px;
margin: 0 10px 0 0;
font-size: 14px;
text-align: center;
}

.email-app nav .nav .nav-item .nav-link .badge,
.email-app nav .nav .nav-item .navbar .dropdown-toggle .badge,
.navbar .email-app nav .nav .nav-item .dropdown-toggle .badge {
float: right;
margin-top: 4px;
margin-left: 10px;
}

.email-app main {
min-width: 0;
flex: 1;
padding: 1rem;
}

.email-app .inbox .toolbar {
padding-bottom: 1rem;
border-bottom: 1px solid #e1e6ef;
}

.email-app .inbox .messages {
padding: 0;
list-style: none;
}

.email-app .inbox .message {
position: relative;
padding: 1rem 1rem 1rem 2rem;
cursor: pointer;
border-bottom: 1px solid #e1e6ef;
}

.email-app .inbox .message:hover {
background: #f9f9fa;
}

.email-app .inbox .message .actions {
position: absolute;
left: 0;
display: flex;
flex-direction: column;
}

.email-app .inbox .message .actions .action {
width: 2rem;
margin-bottom: 0.5rem;
color: #c0cadd;
text-align: center;
}

.email-app .inbox .message a {
color: #000;
}

.email-app .inbox .message a:hover {
text-decoration: none;
}

.email-app .inbox .message.unread .header,
.email-app .inbox .message.unread .title {
font-weight: bold;
}

.email-app .inbox .message .header {
display: flex;
flex-direction: row;
margin-bottom: 0.5rem;
}

.email-app .inbox .message .header .date {
margin-left: auto;
}

.email-app .inbox .message .title {
margin-bottom: 0.5rem;
overflow: hidden;
text-overflow: ellipsis;
white-space: nowrap;
}

.email-app .inbox .message .description {
font-size: 12px;
}

.email-app .message .toolbar {
padding-bottom: 1rem;
border-bottom: 1px solid #e1e6ef;
}

.email-app .message .details .title {
padding: 1rem 0;
font-weight: bold;
}

.email-app .message .details .header {
display: flex;
padding: 1rem 0;
margin: 1rem 0;
border-top: 1px solid #e1e6ef;
border-bottom: 1px solid #e1e6ef;
}

.email-app .message .details .header .avatar {
width: 40px;
height: 40px;
margin-right: 1rem;
}

.email-app .message .details .header .from {
font-size: 12px;
color: #9faecb;
align-self: center;
}

.email-app .message .details .header .from span {
display: block;
font-weight: bold;
}

.email-app .message .details .header .date {
margin-left: auto;
}

.email-app .message .details .attachments {
padding: 1rem 0;
margin-bottom: 1rem;
border-top: 3px solid #f9f9fa;
border-bottom: 3px solid #f9f9fa;
}

.email-app .message .details .attachments .attachment {
display: flex;
margin: 0.5rem 0;
font-size: 12px;
align-self: center;
}

.email-app .message .details .attachments .attachment .badge {
margin: 0 0.5rem;
line-height: inherit;
}

.email-app .message .details .attachments .attachment .menu {
margin-left: auto;
}

.email-app .message .details .attachments .attachment .menu a {
padding: 0 0.5rem;
font-size: 14px;
color: #e1e6ef;
}

@media (max-width: 767px) {
.email-app {
    flex-direction: column;
}
.email-app nav {
    flex: 0 0 100%;
}
}

@media (max-width: 575px) {
.email-app .message .header {
    flex-flow: row wrap;
}
.email-app .message .header .date {
    flex: 0 0 100%;
}
}
</style>

<div class="email-app" style="margin-left:5%;margin-top:5%;">
    <main>
        <p class="text-center">New Message</p>
        <form action="./user_db/db_compose.php" method="POST">
            <div class="form-row mb-3">
                <label for="to" class="col-2 col-sm-1 col-form-label">To:</label>
                <div class="col-10 col-sm-11">
                    <input type="email" class="form-control" name="to_user" id="to" placeholder="Type email" require>
                </div>
            </div>
           <!-- <div class="form-row mb-3">
                <label for="cc" class="col-2 col-sm-1 col-form-label">CC:</label>
                <div class="col-10 col-sm-11">
                    <input type="email" class="form-control" id="cc" placeholder="Type email">
                </div>
            </div>
            <div class="form-row mb-3">
                <label for="bcc" class="col-2 col-sm-1 col-form-label">BCC:</label>
                <div class="col-10 col-sm-11">
                    <input type="email" class="form-control" id="bcc" placeholder="Type email">
                </div>
            </div>
        -->
        <div class="row">
            <div class="col-sm-11 ml-auto">
                <div class="toolbar" role="toolbar">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-bold"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-italic"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-underline"></span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-align-left"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-align-right"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-align-center"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-align-justify"></span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-indent"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-outdent"></span>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-list-ul"></span>
                        </button>
                        <button type="button" class="btn btn-light">
                            <span class="fa fa-list-ol"></span>
                        </button>
                    </div>
                    <button type="button" class="btn btn-light">
                        <span class="fa fa-trash-o"></span>
                    </button>
                    <button type="button" class="btn btn-light">
                        <span class="fa fa-paperclip"></span>
                    </button>
                    <div class="btn-group">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
                            <span class="fa fa-tags"></span>
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">add label <span class="badge badge-danger"> Home</span></a>
                            <a class="dropdown-item" href="#">add label <span class="badge badge-info"> Job</span></a>
                            <a class="dropdown-item" href="#">add label <span class="badge badge-success"> Clients</span></a>
                            <a class="dropdown-item" href="#">add label <span class="badge badge-warning"> News</span></a>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <textarea class="form-control" id="message" name="message" rows="12" placeholder="Click here to reply" require></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" name="send" style="min-width:100px;">Send</button>
                    <button type="submit" class="btn btn-danger" name="send_anonymous" style="min-width:100px;">Send Anonymously</button>
                </div>
            </div>
        </div>
        </form>
    </main>
</div>



<?php
  include_once 'footer.php';
?>
