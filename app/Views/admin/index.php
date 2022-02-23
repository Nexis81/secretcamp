<?= $this->extend('admin/layout') ?>
<?= $this->section('pageStyles') ?>
<?= $this->endSection() ?>
<?= $this->section('pageScripts') ?>
<?= $this->endSection() ?>
<?= $this->section('main') ?>
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Admin</li>
    </ol>
    <p>Welcome to the administration dashboard! Here's you'll be able to edit rates by using the menu on the left.</p>
    <p>To edit rates, just enter a whole number and press submit. That's all!</p>
    <p>If you have any questions, please contact us at <a href="https://<?= $config->authorURL ?>" target="_new"><?= $config->authorURL ?></a> or email us at <a href="mailto://<?= $config->authorCompanyEmail ?>"><?= $config->authorCompanyEmail ?></a>.</p>
   
   
</div>
<?= $this->endSection() ?>