<div>
    <form wire:submit.prevent="submit">
        <div class="form-group">
            <label for="exampleInputName">Title</label>                   
            <input type="text" class="form-control" id="exampleInputName" placeholder="Enter name" wire:model="title">                   
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror                   
        </div>     

        <div class="form-group">                    
            <label for="exampleInputEmail">Author</label>                   
            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter name" wire:model="author">                   
            @error('author') <span class="text-danger">{{ $message }}</span> @enderror                    
        </div>     
        
        <div class="form-group">                    
            <label for="exampleInputEmail">Genre</label>                   
            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter name" wire:model="genre">                   
            @error('genre') <span class="text-danger">{{ $message }}</span> @enderror                    
        </div>   

        <div class="form-group">                    
            <label for="exampleInputEmail">Cover</label>                   
            <input type="text" class="form-control" id="exampleInputEmail" placeholder="Enter name" wire:model="cover">                   
            @error('cover') <span class="text-danger">{{ $message }}</span> @enderror                    
        </div>   
    
        <div class="form-group">
            <label for="exampleInputbody">Description</label>
            <textarea class="form-control" id="exampleInputbody" placeholder="Enter Body" wire:model="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Save Book</button>
    </form>
</div>
