<?php

namespace Acme\DemoBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;

class TestCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('test')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        foreach ($finder->files()->in(__DIR__.'/../../../test1') as $file) {
            $output->writeln($file->getFilename());
        }
        $output->writeln('----------------');
        //$finder = new Finder();
        foreach (iterator_to_array($finder->directories()->in(__DIR__.'/../../../test1'), true) as $folder) {
            $output->writeln($folder->getFilename());
        }
    }
}
