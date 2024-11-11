<?php
function getMonthTime() {
    // Obtém o timestamp do mês atual ou do mês passado (caso seja passado pela URL)
    return isset($_GET['month']) ? strtotime($_GET['month']) : time();

}

function prevMonth($currentMonthTime) {
    // Retorna o timestamp do mês anterior
    return date('M-Y', strtotime('-1 month', $currentMonthTime));
    
}

function nextMonth($currentMonthTime) {
    // Retorna o timestamp do próximo mês
    return date('M-Y', strtotime('+1 month', $currentMonthTime));
    
}
?>