<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="/">
                        <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                        Website
                    </a>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Admin Dashboard
                    </a>
                    
                    <div class="sb-sidenav-menu-heading">Pages</div>
                    <a class="nav-link" href="/admin/pages/rates">
                        <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                        Rates
                    </a>
                   
                    <!--div class="sb-sidenav-menu-heading">System</div>
                    <a class="nav-link" href="/admin/system/users">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                    </a-->
                    <!--a class="nav-link" href="/admin/system/settings">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        Settings
                    </a-->
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $user->username ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <?= $this->renderSection('main') ?>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; <a href="https://<?= $config->authorURL ?>" target="_new"><?= $config->authorCompany ?></a> <?= $year ?></div>
                    <div>
                        Author: <?= $config->authorName ?> (<a href="mailto://<?= $config->authorEmail ?>"><?= $config->authorEmail ?></a>)
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>