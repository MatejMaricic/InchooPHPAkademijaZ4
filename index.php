

<?php

// index.php starts the app, requires all classes and creates instance of AppManagement class which prints out start menu

require 'EmployeesStorage.php';
require 'Users.php';
require 'UserAction.php';
require 'AppManagement.php';
require 'EmployeeView.php';
require 'Statistics.php';


new AppManagement();







