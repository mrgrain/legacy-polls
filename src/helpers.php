<?php
namespace Frogsystem\Legacy\Polls;

/**
 * Check if the visitor has already voted in the given poll
 * @param integer $poll_id
 * @return bool
 */
function checkVotedPoll($poll_id)
{
    global $FD;

    settype($poll_id, 'integer');

    if (isset($_COOKIE['polls_voted'])) {
        $votes = explode(',', $_COOKIE['polls_voted']);
        if (in_array($poll_id, $votes)) {
            return true;
        }
    }
    $one_day_ago = time() - 60 * 60 * 24;
    $FD->db()->conn()->exec('DELETE FROM ' . $FD->db()->getPrefix() . "poll_voters WHERE time <= '" . $one_day_ago . "'"); //Delete old IPs
    $query_id = $FD->db()->conn()->prepare('SELECT COUNT(voter_id) FROM ' . $FD->db()->getPrefix() . "poll_voters WHERE poll_id = $poll_id AND ip_address = ? AND time > '" . $one_day_ago . "' LIMIT 1"); //Save IP for 1 Day
    $query_id->execute(array($_SERVER['REMOTE_ADDR']));
    return ($query_id->fetchColumn() > 0);
}

/**
 * Register the voter in the db to avoid multiple votes
 * @param integer $poll_id
 * @param string $voter_ip
 */
function registerVoter($poll_id, $voter_ip)
{
    global $FD;

    settype($poll_id, 'integer');

    $FD->db()->conn()->exec('INSERT INTO ' . $FD->db()->getPrefix() . "poll_voters VALUES ('', '$poll_id', '$voter_ip', '" . time() . "')");
    if (!isset($_COOKIE['polls_voted'])) {
        setcookie('polls_voted', $poll_id, time() + 60 * 60 * 24 * 60); //2 months
    } else {
        setcookie('polls_voted', $_COOKIE['polls_voted'] . ',' . $poll_id, time() + 60 * 60 * 24 * 60);
    }
}
