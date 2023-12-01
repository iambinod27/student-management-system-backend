<div id="attendance" class="tabcontent">
    <!-- Navbar -->
    <nav class="nav">
        <div class="hamburger">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg> -->
        </div>
        <p>Welcome to Student Management System</p>
        <div class="nav-admin">
            <a href="./pages/logout.php">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
                logout <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                </svg> -->
            </a>
        </div>
    </nav>

    <!-- Navbar -->

    <div class="container">
        <!-- breadcrumb -->
        <p class="breadcrumb">Home > Attendance</p>
        <!-- end of breadcrumb -->

        <div class="classes">
            <h2>All Classes</h2>
            <form class="form-select">
                <label for="class">Select Class :</label>

                <select name="class" id="One">
                    <?php
                    require "./database.php";
                    $classQuery = 'SELECT id, grade_name FROM classes';
                    $classResult = mysqli_query($conn, $classQuery);

                    while ($row = mysqli_fetch_assoc($classResult)) {
                        echo ("<option value={$row['id']}> {$row['grade_name']} </option>");
                    }
                    ?>
                </select>
                <!-- <button type="submit" name="submit" value="filter">
                </button> -->
            </form>

            <div class="attendance-head">
                <div>
                    <h4>Class : Nine</h4>
                    <p>Teacher : Pannalal BK</p>
                    <p>Total Student : 36</p>
                </div>
                <div class="attendance-date">
                    <label>Date: </label>
                    <input type="date" name="aDate" class="form-d-input" />
                </div>
            </div>

            <!-- table -->
            <ul class="responsive-table">
                <li class="table-header">
                    <div class="col col-1">S.ID</div>
                    <div class="col col-2">Full Name</div>
                    <div class="col col-3">ROll no</div>
                    <div class="col col-4 activity-col">Activity</div>
                </li>
                <!-- table-list -->
                <li class="table-row">
                    <div class="col col-1">02</div>
                    <div class="col col-2">Panna Lal</div>
                    <div class="col col-3">09</div>
                    <div class="col col-4 activity-col">
                        <div class="activity-control">
                            <div>
                                <input type="radio" id="activity" name="fav_language" value="Present" checked />
                                <label for="Present">Present</label>
                            </div>
                            <div>
                                <input type="radio" id="activity" name="fav_language" value="Absent" />
                                <label for="Absent">Absent</label>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- end of table-list -->
                <!-- table-list -->
                <li class="table-row">
                    <div class="col col-1">02</div>
                    <div class="col col-2">Panna Lal</div>
                    <div class="col col-3">09</div>
                    <div class="col col-4 activity-col">
                        <div class="activity-control">
                            <div>
                                <input type="radio" id="activity" name="fav_language" value="Present" checked />
                                <label for="Present">Present</label>
                            </div>
                            <div>
                                <input type="radio" id="activity" name="fav_language" value="Absent" />
                                <label for="Absent">Absent</label>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- end of table-list -->
                <!-- table-list -->
                <li class="table-row">
                    <div class="col col-1">02</div>
                    <div class="col col-2">Panna Lal</div>
                    <div class="col col-3">09</div>
                    <div class="col col-4 activity-col">
                        <div class="activity-control">
                            <div>
                                <input type="radio" id="activity" name="fav_language" value="Present" checked />
                                <label for="Present">Present</label>
                            </div>
                            <div>
                                <input type="radio" id="activity" name="fav_language" value="Absent" />
                                <label for="Absent">Absent</label>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- end of table-list -->
            </ul>
            <!-- end of table -->

            <input name="submit" type="submit" value="Submit" class="attendance-button" />
            </form>
        </div>
    </div>
    </main>