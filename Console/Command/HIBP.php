<?php
/**
 * Wagento Have I Been Pwned?
 *
 * Adds test to built-in password strength indicator to check if password has
 * been used on other sites.
 *
 * @package Wagento\HIBP\Console\Command
 * @author Joseph Leedy <joseph@wagento.com>, Chirag Dodia <chirag.dodia@wagento.com>, Thanh Nguyen <leo@wagento.com>
 * @copyright Copyright (c) Wagento Creative LLC. (https://www.wagento.com/)
 * @license https://opensource.org/licenses/OSL-3.0.php Open Software License 3.0
 */
declare(strict_types=1);

namespace Wagento\HIBP\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Wagento\HIBP\Model\Hibp as HibpModel;

class HIBP extends Command
{
    const PASSWORD = 'password';

    /**
     * Command Line class HIBP constructor.
     * @param Hibp $hibp
     */
    public function __construct(
        HibpModel $hibp
    ) {
        $this->hibp = $hibp;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('hibp:check-password')
             ->setDescription('Wagento Have I Been Pwned - Check Password')
             ->addArgument(
                 self::PASSWORD,
                 InputArgument::REQUIRED,
                 'Password To Check'
             );

        parent::configure();
    }

    /**
     * check input password from command line
     * @param InputInterface
     * @param OutputInterface
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $password = $input->getArgument(self::PASSWORD);

        $isPwnedPassword = $this->hibp->isPwnedPassword($password);
        $count = $this->hibp->count();
        if ($isPwnedPassword && $count) {
            $output->writeln("Your Password has been Pwned {$count} times !");
        }
        else {
            $output->writeln("Your Password hasn't been Pwned !");
        }
    }
}
