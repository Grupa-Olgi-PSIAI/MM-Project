<?php


namespace util;


final class AuthFlags
{
    const OWN_CREATE = 0x800;
    const OWN_READ = 0x400;
    const OWN_UPDATE = 0x200;
    const OWN_DELETE = 0x100;

    const GROUP_CREATE = 0x080;
    const GROUP_READ = 0x040;
    const GROUP_UPDATE = 0x020;
    const GROUP_DELETE = 0x010;

    const OTHER_CREATE = 0x008;
    const OTHER_READ = 0x004;
    const OTHER_UPDATE = 0x002;
    const OTHER_DELETE = 0x001;

    private function __construct()
    {
    }
}
