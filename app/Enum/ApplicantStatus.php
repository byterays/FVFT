<?php

namespace App\Enum;

interface ApplicantStatus
{
    const PENDING = "pending";
    const SHORTLISTED = "shortlisted";
    const SELECTEDFORINTERVIEW = "selectedForInterview";
    const INTERVIEWED = "interviewed";
    const ACCEPTED = "accepted";
    const REJECTED = "rejected";
    const REDLISTED = "redlisted";
}