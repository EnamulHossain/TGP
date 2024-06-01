<?php

namespace App\Models\Traits;

use App\Models\Role;

trait UserAdmin
{
    /**
     * If User is base admin
     * On /admin login validation and all /admin navigation
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole(Role::$ADMIN);
    }
    
    /**
     * If User is admin
     * @return bool
     */
    public function isSuperAdmin()
    {
        return $this->hasRole(Role::$ADMIN);
    }

    /**
     * If User is admin
     * @return bool
     */
    public function isDeveloper()
    {
        return $this->hasRole(Role::$DEVELOPER);
    }

    public function isUserAdmins()
    {
        return $this->hasRole(Role::$UserAdmins);
    }
    public function isCMSAdmins()
    {
        return $this->hasRole(Role::$CMSAdmins);
    }
    public function isSmartSearchAdmins()
    {
        return $this->hasRole(Role::$SmartSearchAdmins);
    }
    public function isContentAdmins()
    {
        return $this->hasRole(Role::$ContentAdmins);
    }
    public function isGrantors()
    {
        return $this->hasRole(Role::$Grantors);
    }
}
