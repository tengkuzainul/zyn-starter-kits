<?php

namespace App\Traits;

trait WithNotification
{
          /**
           * Dispatch a success notification
           */
          protected function notifySuccess(string $message, ?string $link = null): void
          {
                    $this->dispatch(
                              'notify',
                              message: $message,
                              type: 'success',
                              link: $link
                    );
          }

          /**
           * Dispatch an error notification
           */
          protected function notifyError(string $message, ?string $link = null): void
          {
                    $this->dispatch(
                              'notify',
                              message: $message,
                              type: 'error',
                              link: $link
                    );
          }

          /**
           * Dispatch a warning notification
           */
          protected function notifyWarning(string $message, ?string $link = null): void
          {
                    $this->dispatch(
                              'notify',
                              message: $message,
                              type: 'warning',
                              link: $link
                    );
          }

          /**
           * Dispatch an info notification
           */
          protected function notifyInfo(string $message, ?string $link = null): void
          {
                    $this->dispatch(
                              'notify',
                              message: $message,
                              type: 'info',
                              link: $link
                    );
          }

          /**
           * Dispatch a neutral notification
           */
          protected function notifyNeutral(string $message, ?string $link = null): void
          {
                    $this->dispatch(
                              'notify',
                              message: $message,
                              type: 'neutral',
                              link: $link
                    );
          }
}
