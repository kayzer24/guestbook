### INSTALL Symfony Messenger
Managing asynchronous code with Symfony is the job of the Messenger Component:
> symfony composer req doctrine-messenger

### Consuming Messages
If you try to submit a new comment, the spam checker won't be called anymore. Add an error_log() call in the getSpamScore() method to confirm. Instead, a message is waiting in the queue, ready to be consumed by some processes.

As you might imagine, Symfony comes with a consumer command. Run it now:
> symfony console messenger:consume async -vv

### Running Workers in the Background
Instead of launching the consumer every time we post a comment and stopping it immediately after, we want to run it continuously without having too many terminal windows or tabs open.

The Symfony CLI can manage such background commands or workers by using the daemon flag (-d) on the run command.

Run the message consumer again, but send it in the background:
> symfony run -d --watch=config,src,templates,vendor/composer/installed.json symfony console messenger:consume async -vv

### Retrying Failed Messages
If a problem occurs while handling a message, the consumer will retry 3 times before giving up. But instead of discarding the message, it will store it permanently in the failed queue, which uses another database table.

Inspect failed messages and retry them via the following commands:

> symfony console messenger:failed:show
> 
> symfony console messenger:failed:retry