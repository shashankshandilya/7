require "rubygems"
require "mongo"
require "json"
require "pp"


class MONGO

  include Mongo
	attr_accessor :c, :h, :p, :auth, :log
  
	def initialize props, l, key_host = "127.0.0.1", key_port = "27017"

    @log = l
    begin
      login( key_host, key_port )
      @c = MongoClient.new( @h, @p )
    rescue Exception => e
      @log.info "mongo-initialization:- EXCEPTION *** #{e.message()}  #{e.backtrace()} ***"
      raise
    end

  end

  def login key_host, key_port

    begin
      @h = key_host 
      @p = key_port  
    rescue Exception => e
			@log.info "login:- #{e.message()} while logging into mongo"
			raise
    end

  end

  def read db_name, col_name, select = {}, where = {}

    begin
      col = getCol(db_name, col_name)
      return col.find(where, select).to_a
    rescue Exception => e
      @log.info "mongo-read:- EXCEPTION *** #{e.message()} ***"
      raise
    end

  end

  def insert db_name, col_name, doc

    begin 
      col = getCol(db_name, col_name)
      return col.insert(doc)
    rescue Exception => e
			@log.info "mongo-insert:- EXCEPTION *** #{e.message()} ***"
			raise
    end

  end

  def update db_name, col_name, set, where, options = {}

  	begin
       col = getCol(db_name, col_name)
       return col.update(where, set, options)
    rescue Exception => e
			@log.info "mongo-update:- EXCEPTION *** #{e.message()} ***"
			raise
    end

  end

  def del

  	begin
       
    rescue Exception => e
			@log.info "mongo-del:- EXCEPTION *** #{e.message()} ***"
			raise
    end

  end

  def aggregate db_name, col_name, pipeline = [], opts = {}
		begin
       col = getCol(db_name, col_name)
       return col.aggregate(pipeline, opts)
    rescue Exception => e
			@log.info "mongo-aggregate:- EXCEPTION *** #{e.message()} ***"
			raise
    end  	
  end

  def getCol db_name, col_name

    begin
      db = @c[db_name]
      return db[col_name] 
    rescue Exception => e
      @log.info "mongo-del:- EXCEPTION *** #{e.message()} ***"
      raise
    end

  end



    # Atomically update and return a document using MongoDB's findAndModify command. (MongoDB > 1.3.0)
    #
    # @option opts [Hash] :query ({}) a query selector document for matching the desired document.
    # @option opts [Hash] :update (nil) the update operation to perform on the matched document.

    # @option opts [Array, String, OrderedHash] :sort ({}) specify a sort option for the query using any
    # of the sort options available for Cursor#sort. Sort order is important if the query will be matching
    # multiple documents since only the first matching document will be updated and returned.

    # @option opts [Boolean] :remove (false) If true, removes the the returned document from the collection.
    # @option opts [Boolean] :new (false) If true, returns the updated document; otherwise, returns the document
    # prior to update.
    #
    # @return [Hash] the matched document.
    #
    # @core findandmodify find_and_modify-instance_method
    

  def findAndModify db_name, col_name, where, set

    begin
      col = getCol( db_name, col_name)
      return col.findAndModify({:query => where, :update => set} )  
    rescue Exception => e
      @log.info "mongo-findAndModify:- EXCEPTION *** #{e.message()} ***"
      raise
    end
    
  end

  def test db_name, col_name
    begin
      #col = getCol(db_name, col_name)
      pp @c.test()
    rescue Exception => e
      @log.info "mongo-del:- EXCEPTION *** #{e.message()} ***"
      raise
    end
  end  
  
end
