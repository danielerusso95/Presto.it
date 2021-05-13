// STORY 3

# Aggiungere flag "revisor" alla tabella degli user -> boolean FATTOOOOOOOO

# Creare comando artisan custom che data una mail renda un dato utente revisore -> artisan command make user revisor FATTOOOOOOOO

# Creare middleware custom per proteggere alcune rotte da chi non è revisore -> php artisan make:middleware RevisorMiddleware

# Creare un controller per tutte le funzioni del revisore -> nel construct avrà un $this->middleware('auth.revisor') 

# Aggiungiamo un flag "accepted" che il revisore può spuntare 

# Creare vista per revisore in cui può fare la review dei nuovi annunci 

# Funzionalità per mostrare in pubblico solo gli annunci accettati