<?php

namespace Phalcana\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use Composer\Repository\InstalledRepositoryInterface;

class Installer extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getPackageBasePath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 9);
        if ('phalcana/' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install module, phalcana modules '
                .'should always start their package name with '
                .'"phalcana/"'
            );
        }

        if ($package->getType() == 'phalcana-core') {
            return 'system';
        } else {
            return 'modules/'.substr($package->getPrettyName(), 9);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'phalcana-module' === $packageType || 'phalcana-core' === $packageType;
    }

    /**
     * {@inheritDoc}
     */
    public function install(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::install($repo, $package);
    }

    /**
     * {@inheritDoc}
     */
    public function update(InstalledRepositoryInterface $repo, PackageInterface $initial, PackageInterface $target)
    {
        parent::update($repo, $initial, $target);
    }

    /**
     * {@inheritDoc}
     */
    public function uninstall(InstalledRepositoryInterface $repo, PackageInterface $package)
    {
        parent::uninstall($repo, $package);
    }
}
