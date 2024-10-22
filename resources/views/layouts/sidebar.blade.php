<aside id="sidebar">
    </div>
    <ul class="sidebar-nav">
    <li class="sidebar-item">
            <a href="/trip" class="sidebar-link collapsed has-dropdown" aria-expanded="false" aria-controls="upload">
                <i class="lni lni-home"></i>
                <span>Trip</span>
            </a>
        </li>
        <!-- Update Status -->
        <li class="sidebar-item">
            <a href="/home" class="sidebar-link collapsed has-dropdown" aria-expanded="false" aria-controls="upload">
                <i class="lni lni-home"></i>
                <span>Home</span>
            </a>
        </li>
        <!-- Master Data -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#master" aria-expanded="false" aria-controls="master">
                <i class="lni lni-layout"></i>
                <span>Master Data</span>
            </a>
            <ul id="master" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                <li class="sidebar-item">
                    <a href="/MAWBMaster" class="sidebar-link">Master AWB</a>
                    <a href="/HAWBMaster" class="sidebar-link">House AWB</a>
                    <a href="/status" class="sidebar-link">Master Status</a>
                    <a href="/role_status" class="sidebar-link">Master Rules Status</a>
                </li>
        </li>
    </ul>
    <!-- Upload File -->
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#upload" aria-expanded="false" aria-controls="upload">
            <i class="lni lni-upload"></i>
            <span>Upload File</span>
        </a>
        <ul id="upload" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="/MAWBUpload" class="sidebar-link">Master AWB Upload</a>
                <a href="/updateStatusUpload" class="sidebar-link">Update HAWB Upload Status</a>
                <a href="/deliveryNoteUpload" class="sidebar-link">Delivery Note Upload</a>
            </li>
        </ul>
    </li>
    <!-- Update Status -->
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#status" aria-expanded="false" aria-controls="upload">
            <i class="lni lni-dashboard"></i>
            <span>Status HAWB</span>
        </a>
        <ul id="status" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="/updateStatus" class="sidebar-link">Update HAWB Status</a>
            </li>
            <li class="sidebar-item">
                <a href="/updateRemarkStatus" class="sidebar-link">Edit HAWB</a>
            </li>
        </ul>
    </li>
    <!-- Report -->
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#report" aria-expanded="false" aria-controls="upload">
            <i class="lni lni-printer"></i>
            <span>Report</span>
        </a>
        <ul id="report" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="/mawbTrackingreport" class="sidebar-link">MAWB Tracking Report</a>
                <a href="/hawbTrackingreport" class="sidebar-link">HAWB Tracking Report</a>
            </li>
        </ul>
    </li>
    <!-- Utility -->
    @if(Session::get('roleID') != Session::get('roleNameUser') && Session::get('roleID') != Session::get('roleNameMan'))
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#utility" aria-expanded="false" aria-controls="upload">
            <i class="lni lni-eraser"></i>
            <span>Utility</span>
        </a>
        <ul id="utility" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="/resetHAWBStatus" class="sidebar-link">Reset HAWB Status</a>
            </li>
        </ul>
    </li>
    @endif
    <!-- History -->
    <li class="sidebar-item">
        <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#History" aria-expanded="false" aria-controls="upload">
            <i class="lni lni-notepad"></i>
            <span>History</span>
        </a>
        <ul id="History" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
                <a href="historyUpdateStatus" class="sidebar-link">History Upload Status</a>
            </li>
        </ul>
    </li>

    <!-- Users -->
    @if(Session::get('roleID') != Session::get('roleNameUser') && Session::get('roleID') != Session::get('roleNameMan'))
    <li class="sidebar-item">
        <a href="/users" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Users</span>
        </a>
    </li>
    @else
    <li class="sidebar-item">
        <a href="/changePassword" class="sidebar-link">
            <i class="lni lni-user"></i>
            <span>Users</span>
        </a>
    </li>
    @endif
    <!-- Logs -->
    @if(Session::get('roleID') != Session::get('roleNameUser') && Session::get('roleID') != Session::get('roleNameMan'))
    <br>
    <li class="sidebar-item">
        <a target="_blank" rel="noopener noreferrer" href="/logs" class="sidebar-link">
            <i class="lni lni-menu"></i>
            <span>Logs</span>
        </a>
    </li>
    <li class="sidebar-item">
        <a href="/artisancommand" class="sidebar-link">
            <i class="lni lni-code"></i>
            <span>Artisan Command</span>
        </a>
    </li>
    @endif
    <br>
    <div class="sidebar-footer">
        <a href="/logout" class="sidebar-link">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>