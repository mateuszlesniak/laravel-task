<?php

namespace App\DutyRoster\Dtr\Reader;

use App\DutyRoster\DutyRosterReaderInterface;
use App\DutyRoster\Shared\Dto\ActivitiesDtoCollection;

final class CcnxHtmlReader implements DutyRosterReaderInterface
{
    public function isApplicable(string $mimeType): bool
    {
        return $mimeType === DutyRosterReaderInterface::MIME_TYPE_HTML;
    }

    public function read(string $fileContent): ActivitiesDtoCollection
    {
        return new ActivitiesDtoCollection();
    }


}
