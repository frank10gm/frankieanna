<h2>“Grande palio delle corporazioni medioevali“</h2>
<div class="row" id="ris-palio">
	<form class="form-signin" role="form" id="form-palio">
	
	<div align="center" id="risultato" class="col-lg-offset-3 col-lg-6">
		<h3>Modulo di iscrizione:</h3>
		<br>
		<div style="" >
			
				<input type="text" class="form-control" id="nome" placeholder="Nome (obbligatorio)" required>
				<input type="text" class="form-control" id="cognome" placeholder="Cognome (obbligatorio)" required>		
				<input type="text" class="form-control" id="telefono" placeholder="Telefono" >
				<input type="mail" class="form-control" id="mail" placeholder="Mail (obbligatorio)" required>
				<br>
				<div class="form-group">
				   <label for="data">età</label>
				   <select  class="form-control" id="data">
				    <option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option><option>32</option><option>33</option><option>34</option><option>35</option><option>36</option><option>37</option><option>38</option><option>39</option><option>40</option><option>41</option><option>42</option><option>43</option><option>44</option><option>45</option><option>46</option><option>47</option><option>48</option><option>49</option><option>50</option><option>51</option><option>52</option><option>53</option><option>54</option><option>55</option><option>56</option><option>57</option><option>58</option><option>59</option><option>60</option><option>61</option><option>62</option><option>63</option><option>64</option><option>65</option><option>66</option><option>67</option><option>68</option><option>69</option><option>70</option><option>71</option><option>72</option><option>73</option><option>74</option><option>75</option><option>76</option><option>77</option><option>78</option><option>79</option><option>80</option><option>81</option><option>82</option><option>83</option><option>84</option><option>85</option><option>86</option><option>87</option><option>88</option><option>89</option><option>90</option><option>91</option><option>92</option><option>93</option><option>94</option><option>95</option><option>96</option><option>97</option><option>98</option><option>99</option><option>100</option>
				   </select>
			   	</div>
				<div class="form-group">
				   <label for="corporazione">Corporazione</label>
				   <select  class="form-control" id="corporazione">
				    <option>Orefici</option>
				    <option>Clavature</option>
				    <option>Pescatori</option>
				    <option>Drapperie</option>
				   </select>
			   	</div>
			   	<br>
				<button id="save" class="btn btn-primary" type="submit">Iscriviti!</button>
		</div>
	</div>	
	
	</form>
</div>

<script>

$('#form-palio').submit(function () {
 send();
 return false;
});

var send = function(){
		//var aHTML = $('#summernote').code();
		var nome = $('#nome').val();
		var cognome = $('#cognome').val();
		var mail = $('#mail').val();
		var data = $('#data').val();
		var telefono = $('#telefono').val();
		var corporazione = $('#corporazione').val();	

		
		if(nome == "" || cognome == "" || data == "" ){
			return;
		}
		
		$.post('./php/caricaPalio.php', { nome: nome, cognome: cognome, mail: mail, data: data, telefono: telefono, corporazione: corporazione })
		.success(function(result){
		    alert(result);
		    $('#ris-palio').html('<h3 style="color: red;">Grazie per esserti iscritto!!</h3>');
		    
		})
		.error(function(){
	    	console.log('Error loading page');
		});
	};
</script>