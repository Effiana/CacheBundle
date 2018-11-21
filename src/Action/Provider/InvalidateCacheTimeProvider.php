<?php

namespace Effiana\CacheBundle\Action\Provider;

use Effiana\CacheBundle\Action\Handler\InvalidateCacheScheduleArgumentsBuilderInterface;
use Effiana\CacheBundle\Action\Transformer\DateTimeToStringTransformerInterface;
use Effiana\CacheBundle\Command\InvalidateCacheScheduleCommand;
use Effiana\CacheBundle\DataStorage\DataStorageInterface;
use Oro\Bundle\CronBundle\Entity\Manager\ScheduleManager;
use Oro\Bundle\CronBundle\Entity\Schedule;

class InvalidateCacheTimeProvider
{
    /**
     * @var InvalidateCacheScheduleArgumentsBuilderInterface
     */
    private $scheduleArgsBuilder;

    /**
     * @var ScheduleManager
     */
    private $scheduleManager;

    /**
     * @var DateTimeToStringTransformerInterface
     */
    private $cronFormatTransformer;

    /**
     * @param InvalidateCacheScheduleArgumentsBuilderInterface $scheduleArgsBuilder
     * @param ScheduleManager                                  $scheduleManager
     * @param DateTimeToStringTransformerInterface             $cronFormatTransformer
     */
    public function __construct(
        InvalidateCacheScheduleArgumentsBuilderInterface $scheduleArgsBuilder,
        ScheduleManager $scheduleManager,
        DateTimeToStringTransformerInterface $cronFormatTransformer
    ) {
        $this->scheduleArgsBuilder = $scheduleArgsBuilder;
        $this->scheduleManager = $scheduleManager;
        $this->cronFormatTransformer = $cronFormatTransformer;
    }

    /**
     * @param DataStorageInterface $dataStorage
     *
     * @return \DateTime|null
     */
    public function getByDataStorage(DataStorageInterface $dataStorage)
    {
        $schedule = $this->getSchedule($dataStorage);
        if (!$schedule) {
            return null;
        }

        return $this->cronFormatTransformer->reverseTransform($schedule->getDefinition());
    }

    /**
     * @param DataStorageInterface $dataStorage
     *
     * @return Schedule|null
     */
    private function getSchedule(DataStorageInterface $dataStorage)
    {
        $args = $this->scheduleArgsBuilder->build($dataStorage);
        $schedules = $this->scheduleManager->getSchedulesByCommandAndArguments(
            InvalidateCacheScheduleCommand::NAME,
            $args
        );

        return array_shift($schedules);
    }
}
