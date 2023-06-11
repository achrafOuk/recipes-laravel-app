<x-search-component :searchTerm="empty($searchTerm) ? '': $searchTerm" action="{{route('seach-meals')}}" :areas="$areas" :categories="$categories" /> 
