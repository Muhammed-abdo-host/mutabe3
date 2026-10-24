<?php

namespace App\Enums;

enum Status: string
{
    case Open = 'open';
    case Assigned ='assigned';
    case InProgress = 'in_progress';
    case OnHold ='on_hold';
    case Closed ='closed';
    
}