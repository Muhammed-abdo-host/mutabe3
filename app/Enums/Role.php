<?php

namespace App\Enums;

enum Role: string
{
    case Employee = 'employee';
    case TeamLead ='team_lead';
    case Technician = 'technician';
    case Admin ='admin';
    case Management ='management';
    
}