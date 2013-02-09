require 'logger'

class IWYLogger < Logger
     
  def format_message(severity, timestamp, progname, msg)
  "#{severity} #{timestamp.strftime("[%d-%m-%Y %H:%M:%S]")} : #{msg}\n"
  end
  
end


