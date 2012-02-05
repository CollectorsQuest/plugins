<?php

class myUser extends IceSecurityUser
{
  /**
   * return true or false if the current user can use the translation tools
   *
   * @param sfContext $context
   * @return boolean
   */
  public static function canTranslate(sfContext $context)
  {
    return true;
  }
}
