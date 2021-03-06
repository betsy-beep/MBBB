<link rel="icon" type="image/ico" href="img/anclogo.ico" />
<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin - Manage Users 
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/admin_users.css">
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Autour One">
        <script src="anime/anime.min.js"></script>
        <script type="text/javascript" src="admin_users.js"></script>
    </head>
    <body>
        <div id="bg"><div id="bg-overlay"></div></div>
        <div id="content">
            <div id="create-user-modal-bg">
                <div id="create-user-modal">
                    <button id="create-user-modal-button">Okay</button>
                </div>
            </div>
            <div id="view-user-modal-bg">
                <div id="view-user-modal">
                    <button id="view-user-modal-button">Continue</button>
                </div>
            </div>
            <div id="delete-user-modal-bg">
                <div id="delete-user-modal">
                    <div class="field-column" id="delete-modal-buttons">
                        <button id="delete-user-modal-button">Confirm Delete</button>
                        <button id="not-delete-user-modal-button">Cancel</button>
                    </div>
                    <button id="not-found-delete-button">Okay</button>
                </div>
            </div>
            <div id="admin-page-header">
                <h1>Admin (Manage Users)</h1>
            </div>
            <div id="admin-action">
                <div class="action" onClick="location.href = 'Admin.html'">
                    <p><b>Back</b></p>
                </div>
                <div class="action" id="create-users"  onClick="selectThisForm(this, getElementById('form-create-users'))">
                    <p><b>Create Users</b></p>
                </div>
                <div class="action" id="view-users" onClick="location.href = 'ViewUser.html'" onClick="selectThisForm(this, getElementById('form-view-users'))">
                    <p><b>View Users Info</b></p>
                </div>
                <div class="action" id="delete-users" onClick="selectThisForm(this, getElementById('form-delete-users'))">
                    <p><b>Delete Users</b></p>
                </div>
                <div class="action" id="update-users" onClick="selectThisForm(this, getElementById('form-update-users'))">
                    <p><b>Update Users Info</b></p>
                </div>
            </div>
			<div id="form-view-users">
                    <p><b>View User Account</b></p>
                    <form autocomplete="off" onSubmit="return viewUsers('searchusername','view-user-modal','view-user-modal-bg')">
                        <div class="field-row">
                            <img src="image/user.png" width="8%" height="auto">
                            <input placeholder="Username" type="text" name="username" id="searchusername" required>
                        </div>
                        <div class="field-column">
                            <button>View Account</button>
                            <button type="reset" style="margin-top: 20px;">Clear Form</button>
                        </div>
                    </form>
                </div>
				</div>
				</body>
				</html>