<?php

declare(strict_types=1);

namespace SimpleBus\Message\Recorder;

class PublicMessageRecorder implements RecordsMessages
{
    use PrivateMessageRecorderCapabilities { record as public; }
}
