<?php
namespace Concrete\Package\BatchModifyUsersJob;

use Concrete\Core\Package\Package;
use Job;

class Controller extends Package
{
    protected $pkgHandle = 'batch_modify_users_job';
    protected $appVersionRequired = '5.7.4.2';
    protected $pkgVersion = '0.8.0';
    protected $pkgAutoloaderMapCoreExtensions = true;

    public function getPackageDescription()
    {
        return t('Modify Users information as automated job');
    }

    public function getPackageName()
    {
        return t('Batch Modify Users');
    }

    public function install()
    {
        $pkg = parent::install();
        $this->installJobs($pkg);
    }
    public function upgrade()
    {
        $pkg = parent::upgrade();
        $this->installJobs($pkg);
    }

    protected function installJobs($pkg)
    {
        $jobHandle = 'batch_modify_users';
        $job = Job::getByHandle($jobHandle);
        if (!is_object($job)) {
            Job::installByPackage($jobHandle, $pkg);
        }
    }
}
